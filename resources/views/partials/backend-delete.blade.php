<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Удалить</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Вы действительно хотите удалить?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Нет</button>
        <a href="" class="btn btn-primary js-delete-confirm-btn">Да</a>
      </div>
    </div>
  </div>
</div>

<script>
  jQuery(document).ready(function($) {
    $('.js-delete-btn').on('click', function(e) {
      e.preventDefault();
      var _this = $(this);
      $('.js-delete-confirm-btn').attr('href', _this.data('href'));
    })
  });
  
</script>