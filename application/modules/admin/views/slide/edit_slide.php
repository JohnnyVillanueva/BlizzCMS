    <section class="uk-section uk-section-xsmall" data-uk-height-viewport="expand: true">
      <div class="uk-container">
        <div class="uk-grid uk-grid-small uk-margin-small" data-uk-grid>
          <div class="uk-width-expand uk-heading-line">
            <h3 class="uk-h3"><i class="far fa-image"></i> <?= lang('placeholder_edit_slide'); ?></h3>
          </div>
          <div class="uk-width-auto">
            <a href="<?= site_url('admin/slides'); ?>" class="uk-icon-button"><i class="fas fa-arrow-circle-left"></i></a>
          </div>
        </div>
        <div class="uk-card uk-card-default">
          <div class="uk-card-body">
            <?= form_open('', 'id="updateslideForm" onsubmit="UpdateSlideForm(event)"'); ?>
            <div class="uk-margin-small">
              <label class="uk-form-label"><?= lang('placeholder_title'); ?></label>
              <div class="uk-form-controls">
                <div class="uk-inline uk-width-1-1">
                  <input class="uk-input" type="text" id="slide_title" value="<?= $this->admin_model->getSlideSpecifyTitle($idlink); ?>" placeholder="<?= lang('placeholder_title'); ?>" required>
                </div>
              </div>
            </div>
            <div class="uk-margin-small">
              <label class="uk-form-label"><?= lang('placeholder_description'); ?></label>
              <div class="uk-form-controls">
                <textarea class="uk-textarea" id="slide_description" rows="3"><?= $this->admin_model->getSlideSpecifyDescription($idlink); ?></textarea>
              </div>
            </div>
            <div class="uk-margin-small">
              <div class="uk-grid uk-grid-small" data-uk-grid>
                <div class="uk-inline uk-width-1-3@s">
                  <label class="uk-form-label"><?= lang('placeholder_type');?></label>
                  <div class="uk-form-controls">
                    <select class="uk-select" id="slide_type">
                      <option value="0"><?= lang('notification_select_type'); ?></option>
                      <option value="1" <?php if($this->admin_model->getSlideSpecifyType($idlink) == '1') echo 'selected'; ?>><?= lang('option_image'); ?></option>
                      <option value="2" <?php if($this->admin_model->getSlideSpecifyType($idlink) == '2') echo 'selected'; ?>><?= lang('option_video'); ?></option>
                      <option value="3" <?php if($this->admin_model->getSlideSpecifyType($idlink) == '3') echo 'selected'; ?>><?= lang('option_iframe'); ?></option>
                    </select>
                  </div>
                </div>
                <div class="uk-inline uk-width-2-3@s">
                  <label class="uk-form-label"><?= lang('placeholder_route'); ?></label>
                  <div class="uk-form-controls">
                    <input class="uk-input" type="text" id="slide_route" value="<?= $this->admin_model->getSlideSpecifyRoute($idlink); ?>" placeholder="URL or Image Name" required>
                  </div>
                </div>
              </div>
            </div>
            <div class="uk-margin-small">
              <button class="uk-button uk-button-primary uk-width-1-1" type="submit" id="button_upslide"><i class="fas fa-sync-alt"></i> <?= lang('button_save'); ?></button>
            </div>
            <?= form_close(); ?>
          </div>
        </div>
      </div>
    </section>

    <script>
      function UpdateSlideForm(e) {
        e.preventDefault();

        var id = "<?= $idlink ?>";
        var title = $('#slide_title').val();
        var description = $('#slide_description').val();
        var type = $('#slide_type').val();
        var route = $('#slide_route').val();
        if(title == ''){
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
        if(type == 0){
          $.amaran({
            'theme': 'awesome error',
            'content': {
              title: '<?= lang('notification_title_error'); ?>',
              message: '<?= lang('notification_select_type'); ?>',
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
          url:"<?= site_url('admin/slides/update'); ?>",
          method:"POST",
          data:{id, title, description, type, route},
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
                  message: '<?= lang('notification_slide_edited'); ?>',
                  info: '',
                  icon: 'fas fa-check-circle'
                },
                'delay': 5000,
                'position': 'top right',
                'inEffect': 'slideRight',
                'outEffect': 'slideRight'
              });
            }
            $('#updateslideForm')[0].reset();
            window.location.replace("<?= site_url('admin/slides/edit/'.$idlink); ?>");
          }
        });
      }
    </script>
