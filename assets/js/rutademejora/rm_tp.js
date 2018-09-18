$(function() {
    obj_rm_tp = new Rm_tp();
});
$("#btn_grabar_tp").click(function(){
  obj_rm_tp = new Rm_tp();
  obj_rm_tp.valida_campos_tp();


            });



function Rm_tp(){
  _thisrm_tp = this;
}

Rm_tp.prototype.valida_campos_tp = function(){


};
