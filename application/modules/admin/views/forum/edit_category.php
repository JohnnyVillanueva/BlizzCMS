    <section class="uk-section uk-section-xsmall" data-uk-height-viewport="expand: true">
      <div class="uk-container">
        <div class="uk-grid uk-grid-small uk-margin-small" data-uk-grid>
          <div class="uk-width-expand uk-heading-line">
            <h3 class="uk-h3"><i class="fas fa-edit"></i> <?= lang('placeholder_edit_category'); ?></h3>
          </div>
          <div class="uk-width-auto">
            <a href="<?= site_url('admin/forum'); ?>" class="uk-icon-button"><i class="fas fa-arrow-circle-left"></i></a>
          </div>
        </div>
        <div class="uk-card uk-card-default">
          <div class="uk-card-body">
            <?= form_open('', 'id="updatecategoryForm" onsubmit="UpdateCategoryForm(event)"'); ?>
              <div class="uk-margin-small">
                <label class="uk-form-label"><?= lang('placeholder_title'); ?></label>
                <div class="uk-form-controls">
                  <div class="uk-inline uk-width-1-1">
                    <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: pencil"></span>
                    <input class="uk-input" type="text" id="forum_category" value="<?= $this->admin_model->getForumCategoryName($idlink); ?>" placeholder="<?= lang('placeholder_title'); ?>" required>
                  </div>
                </div>
              </div>
              <div class="uk-margin-small">
                <button class="uk-button uk-button-primary uk-width-1-1" type="submit" id="button_upcategory"><i class="fas fa-sync-alt"></i> <?= lang('button_save'); ?></button>
              </div>
            <?= form_close(); ?>
          </div>
        </div>
      </div>
    </section>

    <script>
      function UpdateCategoryForm(e) {
        e.preventDefault();

        var id = "<?= $idlink ?>";
        var category = $('#forum_category').val();
        if(category == ''){
          $.amaran({
            'theme': 'awesome error',
            'content': {
              title: '<?= lang('notification_title_error'); ?>',
              message: '<?= lang('notification_title_empty'); ?>',
              info: '',
              icon: 'fas fa-times-circle'
            },
            'delay': 5000,
            'position': 'top right',
            'inEffect': 'slideRight',
            'outEffect': 'slideRight'
          });
          return false;
        }
        $.ajax({
          url:"<?= site_url('admin/forum/category/update'); ?>",
          method:"POST",
          data:{id, category},
          dataType:"text",
          beforeSend: function(){
            $.amaran({
              'theme': 'awesome info',
              'content': {
                title: '<?= lang('notification_title_info'); ?>',
                message: '<?= lang('notification_checking'); ?>',
                info: '',
                icon: 'fas fa-sign-in-alt'
              },
              'delay': 5000,
              'position': 'top right',
              'inEffect': 'slideRight',
              'outEffect': 'slideRight'
            });
          },
          success:function(response){
            if(!response)
              alert(response);

            if (response) {
              $.amaran({
                'theme': 'awesome ok',
                  'content': {
                  title: '<?= lang('notification_title_success'); ?>',
                  message: '<?= lang('notification_category_edited'); ?>',
                  info: '',
                  icon: 'fas fa-check-circle'
                },
                'delay': 5000,
                'position': 'top right',
                'inEffect': 'slideRight',
                'outEffect': 'slideRight'
              });
            }
            $('#updatecategoryForm')[0].reset();
            window.location.replace("<?= site_url('admin/forum/category/edit/'.$idlink); ?>");
          }
        });
      }
    </script>
