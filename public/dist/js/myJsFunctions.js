// JavaScript Document
var tabsNav = function (){
	var counting=1;
	var i=0;
	var nTabs=0;
	var tab=[];
	var tabContainer=[];
	while(counting==1){
		if(document.getElementById("tab"+i)){
			tab.push(document.getElementById("tab"+i));
			tabContainer.push(document.getElementById("tabContainer"+i));
			i++;
		}
		else counting=0;
	}
	nTabs=i;
	for(k=0;k<nTabs;k++){
		tab[k].onclick=function(){
			var _name=this.getAttribute("name");
			for(j=0;j<nTabs;j++){
				tab[j].classList.add("lockTab");
				tab[j].classList.remove("actTab");
				tabContainer[j].classList.add("hideTabContainer");
				tabContainer[j].classList.remove("showTabContainer");
			}
			this.classList.add("actTab");
			this.classList.remove("lockTab");
			tabContainer[parseInt(_name)].classList.add("showTabContainer");
			tabContainer[parseInt(_name)].classList.remove("hideTabContainer");
		}
	}
}

var removeClass = function(id,class1){
	var element = document.getElementById(id);
	element.classList.remove(class1);
}
var addClass = function(id,class1){
	var element = document.getElementById(id);
	element.classList.add(class1);
}
var addRemoveClass = function(id,class1){
	var element = document.getElementById(id);
	var className=element.className;
	if(className.indexOf(class1)==-1)
		element.classList.add(class1);
	else element.classList.remove(class1);
}
var switchClass = function(id,class1,class2){
	var element = document.getElementById(id);
	var className = element.className;
	if(className.indexOf(class1)==-1){
		element.classList.remove(class2);
		element.classList.add(class1);
	}else{
		element.classList.remove(class1);
		element.classList.add(class2);
	}
}
var menuBar = function(){
	if(document.getElementById("menu-toggle")){
		$("#menu-toggle").click(function(e) {
			e.preventDefault();
			$("#wrapper").toggleClass("toggled");
		});
	}
}
var scrollBar = function(){
	if(document.getElementsByClassName("scrollable")){
		(function($){
				$(window).on("load",function(){
				$(".scrollable").mCustomScrollbar({theme:"minimal"});
				$(".scrollable").mCustomScrollbar({axis:"y"});
			});
		})(jQuery);
	}
	if(document.getElementsByClassName("scrollableX")){
		(function($){
				$(window).on("load",function(){
				$(".scrollableX").mCustomScrollbar({
					theme:"minimal",
					axis:"x"
				});
			});
		})(jQuery);
	}
}
var stickNavBar = function(){
	if(document.getElementById("header")){
		var pos=100;
		$(window).on('scroll',function(){
			$('#header').toggleClass('hideHeader',$(window).scrollTop()>pos);
			pos=$(window).scrollTop();
		})
	}
	if(document.getElementById("menu")){
		var pos2=0;
		$(window).on('scroll',function(){
			$('#menu').toggleClass('stickMenu',$(window).scrollTop()>pos2);
			pos2=$(window).scrollTop();
		})
	}
	$(window).scroll(function(){
		if($('#header').offset().top>40) $('#header').addClass("bg-colorBgBlackTransparent-10");
		else $('#header').removeClass('bg-colorBgBlackTransparent-10');
	})
	
}

var edit = function(){
	var hideShow = function(btn,inputs){
		btn.setAttribute("hidden","");
		for(j=0;j<inputs.length;j++){
			inputs[j].removeAttribute("readonly");
			inputs[j].classList.remove("form-control-plaintext");
			inputs[j].classList.add("form-control");
		}
	}
	var hideShow2 = function(btn,editButtons,inputs){
		btn.removeAttribute("hidden");
		for(k=0;k<editButtons.length;k++)editButtons[k].setAttribute("hidden","");
		for(k=0;k<inputs.length;k++){
			inputs[k].setAttribute("readonly","");
			inputs[k].classList.add("form-control-plaintext");
			inputs[k].classList.remove("form-control");
		}
	}
	if(document.getElementsByClassName("editRecord").length>0){
		btns=document.getElementsByClassName("editRecord");
		for(i = 0; i < btns.length; i++){
			btns[i].onclick=function(evt){
				evt.preventDefault();
				var idBtn=this.getAttribute("id");
				var inputs=document.getElementsByClassName(idBtn+"editRecordInput");
				var editButtons=document.getElementsByClassName(idBtn+"-editBtns");
				var btn=document.getElementById(idBtn);
				hideShow(this,inputs);
				for(j=0;j<editButtons.length;j++){
					editButtons[j].removeAttribute("hidden");//hide editing buttons
					if(editButtons[j].getAttribute("type")=="reset"){
						editButtons[j].onclick=function(evt3){//Cancel button function
							hideShow2 (btn,editButtons,inputs);
							for(k=0;k<inputs.length;k++){
								inputs[k].value=inputs[k].getAttribute("preValue");
							}
						}
					}
					if(editButtons[j].getAttribute("type")=="submit"){
						editButtons[j].onclick=function(event){//Submit button function
							event.preventDefault();
							hideShow2 (btn,editButtons,inputs);
							var f=document.getElementById(btn.name);//form
							submitFunction(f);
						}
					}
				}
			}
		}
	}
}
var constructModal = function(id,tittle,body,footer, theme){
	var modal = $('<div id="'+id+'" class="modal fade '+theme+'" tabindex="-1" role="dialog"></div>');
	var modalDialog = $('<div class="modal-dialog" role="document"></div>');
	var modalContent = $('<div class="modal-content bg-colorBg2"></div>');
	var modalHeader = $('<div class="modal-header"></div>');
	var modalTittle = $('<h5 class="modal-title">'+tittle+'</h5>');
	var modalCloseBotton = $('<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
	var modalBody = $('<div class="modal-body">'+body+'</div>');
	var modalFooter = $('<div class="modal-footer"></div>');
	modalFooter.append(footer);
	modal.append(modalDialog);
	modalDialog.append(modalContent);
	modalContent.append(modalHeader);
	modalHeader.append(modalTittle);
	modalHeader.append(modalCloseBotton);
	modalContent.append(modalBody);
	modalContent.append(modalFooter);
	return modal;
}
var loadModal = function(url,modalId,theme,modalClass){
	var modal = $('<div id="'+modalId+'" class="modal fade '+modalClass+'" tabindex="-1" role="dialog"></div>');
	var modalDialog = $('<div class="modal-dialog bd-example-modal-lg" role="document"></div>');
	var modalContent = $('<div class="modal-content '+theme+'"></div>');
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			modalContent.append(this.responseText);
		}
	};
	xhttp.open("GET", url, true);
	xhttp.send();
	modal.append(modalDialog);
	modalDialog.append(modalContent);
	return modal;
}
var loadModule = function(container,url,method,args){
	var xhttp = new XMLHttpRequest();
	var myUrl=url;
	var myMethod=method;
	var myArgs;
	if(myMethod=="POST"||myMethod=="post"){
		var myArgs=args;
		$.ajax({
			data: myArgs,
			url: myUrl,
			type: 'post',
			beforeSend: function () {
				container.append("<p class='lead'>Cargando, espere por favor...</p>");
			},
			success:  function (response) {
				container.empty();
				container.append(response);
			},
			error: function(xhr) {
				container.append("<p>Error: "+xhr.statusText + xhr.responseText+"</p>");
			},
		});
	}else if(method=="GET"||method=="get"){
		myUrl=url+"?"+args;
		$.ajax({
			data: null,
			url: myUrl,
			type: 'get',
			beforeSend: function () {
				container.append("<p class='lead'>Cargando, espere por favor...</p>");
			},
			success:  function (response) {
				container.empty();
				container.append(response);
			},
			error: function(xhr) {
				container.append("<p>Error: "+xhr.statusText + xhr.responseText+"</p>");
			},
		});
	}
}
function imgPreview(img,input){
	 if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            img.attr("src",e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
function showBoletin(){
	$("#showBoletin").modal("show");
}
function loadOfertas(){
	var ofertas=document.getElementsByClassName('ofertaCol');
	for(i=0;i<$('.ofertaCol').length;i++){
		var idColOferta= ofertas[i].getAttribute("id");
		var idOferta= ofertas[i].getAttribute("idOferta");
		loadModule($('#'+idColOferta),"modules/oferta/oferta1.php","POST",{"oferta":idOferta});
	}
	if(document.getElementById('myPost')){
		var idBoletin=$("#myPost").attr("idBoletin");
		var moduleBoletin=loadModule($('#myPost'),"modules/boletin/boletin1.php","POST",{"boletin":idBoletin});
	}
}
function addToBuyButtons(){
	btnAdd=document.getElementsByClassName("addToBuy");
	for(i=0;i<btnAdd.length;i++){
		btnAdd[i].onclick=function(){
			var modal=constructModal ("added","<span class='icon-cart mx-4'></span>Elemento agregado","Has agregado un elemento al carrito","", "");
			var idNegocio=this.getAttribute("idNegocio");
			var idProducto=this.getAttribute("idProducto");
			var idUsr=this.getAttribute("usr");
			var cantidad=1;
			$.ajax({
				data: {"idUsuario":idUsr, "idProducto":idProducto,"idNegocio":idNegocio,"cantidad":1},
				url: "phpActions/records/regCarrito.php",
				type: 'post',
				beforeSend: function () {
				},
				success:  function (response) {
					$("#modalCarrito").html(modal);
					$("#added").modal("show");
				},
				error: function(xhr) {
					alert("Error: "+xhr.statusText + xhr.responseText);
				},
			});
		}
	}
}
function btnCarrito(){
	document.getElementById("btnCarrito").onclick=function(){
		$.ajax({
			data: {},
			url: "modules/miCarrito.php",
			type: 'post',
			beforeSend: function () {
			},
			success: function (response) {
				$("#miCarritoContent").html(response);
			},
			error: function(xhr) {
				alert("Error: "+xhr.statusText + xhr.responseText);
			},
		});
	}
}