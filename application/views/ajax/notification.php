<div class="card-body" id="showNotification">
    <?php foreach($notifications as $notification):?>
    <?php if($notification['notificationRead'] == 'Tidak'):?>
    <span class="badge bg-red">Unread</span> 
    <?php endif;?>
    <a href="#" data-role="notification" data-id="<?= $notification['notificationId'];?>" class="mb-3 text-reset">
    <p><?= $notification['notificationText'];?></p>       
    </a>
<?php endforeach;?>
</div>

<!-- javascript -->
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','a[data-role=notification]',function(){
      var id = $(this).data('id')

      $.ajax({
        url : '<?= base_url('CRUD/updateNotification');?>',
        type : 'POST',
        data : {
          id : id
        },
        success : function(result){
          $('#showNotification').html(result)
        }
      })
    })
  })
</script>