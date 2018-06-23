// $(function() {
//     obj_loader = new Loader();
// });

function Loader(){
  _this = this;
}

Loader.prototype.show = function(){
	$("#idmodalloader").modal("show");
}

Loader.prototype.hide = function(){
	$('#idmodalloader').modal('hide');
}