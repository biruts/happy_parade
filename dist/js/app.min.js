var APP = APP || {}
APP.Happyparade = {
    setUp: function(){
        this.navBarFixed();
        this.scrollBarNav();
        this.tabPinteHappy();
        this.validarFormDwonload();
        this.habilitarDownload(0);
        this.validarFormCadastro();
        this.applyMask();
        this.hashApply();
    },
    navBarFixed: function(){
        $(window).on('scroll',function() {
            var scrolltop = $(this).scrollTop();

            if(scrolltop >= 390) {
              $('#nav_fixed_client').fadeIn(110);
            }

            else if(scrolltop <= 390) {
              $('#nav_fixed_client').fadeOut(110);
            }
          });
    },
    scrollBarNav: function(){
        // jQuery for page scrolling feature - requires jQuery Easing plugin
        $('.scrollnav').on('click', function(event) {
            var $position = $($(this).attr('href')).offset().top;
            $('html, body').stop().animate({
                scrollTop: $position -77
            }, 600);
            event.preventDefault();
        });
    },
    tabPinteHappy: function(){
        var that = this;
        $('.nav-pills a').click(function (e) {
          e.preventDefault();
          var etapa = $(this).attr("href");

          that.removeMsg();

          if(etapa == "#download"){
            if(!$(".downloadHabilit").length){
                $("#f_preCadastro").submit();
            } else {
                $(this).tab('show');
            }
          } else {
            $(this).tab('show');
          }
        })
    },
    validarFormDwonload: function(){
        var myLanguage = {
            lengthTooShortStart : 'O valor de entrada é ',
            lengthBadEnd: " caráter",
            requiredFields: "O campo obrigatório",
            badEmail: "Endereço de e-mail incorreto"
        }
        var that = this;
        $.validate({
            form : '#f_preCadastro',
            validateOnBlur : true,
            language : myLanguage,
            onError: function () {
                $(".btDownload").removeClass("downloadHabilit");
            },
            onSuccess : function($form) {
                $('#carregando').modal('show');
                $('#carregando').modal({backdrop: false});
                that.ajaxPinteUmHappy($form);
                $form.submit(function(){
                    return false;
                })
                return false
            }
        });
    },
    ajaxPinteUmHappy: function($form){
        var that = this;
        var dados = $form.serialize();
        $.ajax({
            type: "POST",
            url: "download-modelo.php",
            data: dados,
            beforeSend: function(){
            },
            success: function(data){
                $('#carregando').modal('hide');
                that.habilitarDownload(1);                
                //$('#pinte .nav li:eq(1) a').tab('show'); 
                $('#pinte .tab-pane#precadastro, .tab-pane#cadastro').removeClass('show active');
                $('#pinte .tab-pane#download').addClass('active show');

                $('.nav-pills li#dow a').addClass('active');
                $('.nav-pills li#pre a, .nav-pills li#cad a').removeClass('active');

                $('#msgSucess').modal('show');                
            },
            error: function(e) {
                $('#carregando').modal('hide');
                console.log(e);
            }
        });
    },
    habilitarDownload: function(habilita){
        if(habilita){
            $(".btDownload").addClass("downloadHabilit");
        } else {
            $(".btDownload").on("click", function(e){
                if(!$(".btDownload").hasClass("downloadHabilit")){
                    e.preventDefault();
                }
            });
        }
        
    },
    validarFormCadastro: function(){
        var myLanguage = {
            lengthTooShortStart : 'O valor de entrada é ',
            lengthBadEnd: " caráter",
            requiredFields: "Campo obrigatório",
            badEmail: "Endereço de e-mail incorreto",
            wrongFileSize: "O arquivo muito grande, tamanho maximo 16M",
            wrongFileType: "Tipo de arquivo invalido"
        }
        var that = this;
        $.validate({
            form : '#contact',
            modules : 'file',
            validateOnBlur : true,
            language : myLanguage,
            onError: function () {
            },
            onSuccess : function($form) {
                $('#carregando').modal('show');
                $('#carregando').modal({backdrop: false});
            }
        });
    },
    msg: function($field, text){
        var $msg = $('<span class="label label-danger msg-erro-form">'+text+'</span>');
        $field.addClass("erro")
        $field.append($msg);
        $('html, body').stop().animate({
            scrollTop: $field.offset().top - 65
        }, 600);
    },
    removeMsg: function(){
        $(document).find(".erro").removeClass("erro")
        $(document).find(".msg-erro-form").remove();
    },
    applyMask: function(){
        if($(".maskDate, .maskFone, .maskCelular").length){
            $(".maskDate").mask("99/99/9999");
            $(".maskFone").mask("99.99999-9999");
            $(".maskCelular").mask("99.99999-9999");
        }
    },
    hashApply: function(){
        var hash = window.location.hash;
        if(hash){
            $('html, body').stop().animate({
                scrollTop: $(hash).offset().top
            }, 1000);
        }
    }
};
(function(){
    APP.Happyparade.setUp();
})();


// $(document).on('click', '#preCad', function(e) {
//     $('.nav-pills #cad').addClass('active');
//     $('.nav-pills #pre, .nav-pills #dow').removeClass('active');    
// });

// $(document).on('click', '.nav-pills a', function(e) {
//     $('#preCad').removeClass('active show');
// });

$(document).on('click', '#preCad', function(e) {
    $('.nav-pills li#cad a').addClass('active');
    $('.nav-pills li#pre a, .nav-pills li#dow a').removeClass('active');
});

$(document).on('click', '.nav-pills li a', function(e) {
    $('.nav-pills li#preCad a').removeClass('active show');
});

$('.nav-item a').click(function(){
    $('.navbar-collapse').collapse('hide');
}); 

//Carrega Galeria das vacas / Noticias
$(document).ready(function() { 
    $('#galeria-cowparade').load('galeria.html'); 
    $('#noticias-cowparade').load('noticias.html'); 
});
//End Carrega Galeria das vacas / Noticias

//Bloquear scroll no mapa
$('.mapa').click(function () {
    $('.mapa iframe').css("pointer-events", "auto");
});

$( ".mapa" ).mouseleave(function() {
  $('.mapa iframe').css("pointer-events", "none"); 
});
//Bloquear scroll no mapa
