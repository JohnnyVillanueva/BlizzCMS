    <section class="uk-section uk-section-xsmall" data-uk-height-viewport="expand: true">
      <div class="uk-container">
        <div class="uk-grid uk-grid-small uk-margin-small" data-uk-grid>
          <div class="uk-width-expand uk-heading-line">
            <h3 class="uk-h3"><i class="fas fa-images"></i> <?= lang('admin_nav_slides'); ?></h3>
          </div>
          <div class="uk-width-auto">
            <a href="<?= site_url('admin/slides/create'); ?>" class="uk-icon-button"><i class="fas fa-pen"></i></a>
          </div>
        </div>
        <div class="uk-card uk-card-default uk-card-body">
          <div class="uk-overflow-auto">
            <table class="uk-table uk-table-middle uk-table-divider uk-table-small">
              <thead>
                <tr>
                  <th class="uk-table-expand"><?= lang('placeholder_title'); ?></th>
                  <th class="uk-table-expand"><?= lang('placeholder_description'); ?></th>
                  <th class="uk-width-small"><?= lang('placeholder_type'); ?></th>
                  <th class="uk-width-small uk-text-center"><?= lang('table_header_actions'); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php if(isset($slidesList) && !empty($slidesList)): ?>
                <?php foreach($slidesList as $slides): ?>
                <tr>
                  <td><?= $slides->title ?></td>
                  <td><?= $slides->description ?></td>
                  <td><?= $slides->type ?></td>
                  <td>
                    <div class="uk-flex uk-flex-left uk-flex-center@m uk-margin-small">
                      <a href="<?= site_url('admin/slides/edit/'.$slides->id); ?>" class="uk-button uk-button-primary uk-margin-small-right"><i class="fas fa-edit"></i></a>
                      <button class="uk-button uk-button-danger" value="<?= $slides->id ?>" id="button_delete<?= $slides->id ?>" onclick="DeleteSlide(event, this.value)"><i class="fas fa-trash-alt"></i></button>
                    </div>
                  </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
          <div class="uk-card-footer">
            <div class="uk-text-right">
              <?php if (isset($slidesList) && is_array($slidesList)) echo $pagination_links; ?>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script>
      function DeleteSlide(e, value) {
        e.preventDefault();

        $.ajax({
          url:"<?= site_url('admin/slides/delete'); ?>",
          method:"POST",
          data:{value},
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
                  message: '<?= lang('notification_slide_deleted'); ?>',
                  info: '',
                  icon: 'fas fa-check-circle'
                },
                'delay': 5000,
                'position': 'top right',
                'inEffect': 'slideRight',
                'outEffect': 'slideRight'
              });
            }
            window.location.replace("<?= site_url('admin/slides'); ?>");
          }
        });
      }
    </script>
