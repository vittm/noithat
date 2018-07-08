$('.add-productive').click(function(){
    $('.panel-body__productive').append('<br><div class="panel-body__productive__group"><i class="voyager-x close-productive" style="font-size:25px;"></i><div class="form-group"> <input required type="file" class="form-control" name="productive_images[]" placeholder="address"> </div><textarea class="form-control" name="productive_excerpt[]"></textarea></div>');
});
$('.close-productive').click(function(){
  $(this).parent().html("");
}); 