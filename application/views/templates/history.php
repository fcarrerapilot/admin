

    <div id="history_container"  >
      <?php if($historyInfo): ?>
        <h4 id="history_title">Historial de descripcion:</h4><br /> 
      <?php endif; ?>  
      <div class="list-group">
        <?php foreach($historyInfo as $historyEvent): ?>

        <button type="button" class="btn list-group-item" data-toggle="modal" data-target='#history_popup_<?php echo $historyEvent->id; ?>' >
            <?php echo $historyEvent->date.' '.$historyEvent->description; ?>
          </button>

          <div class="modal fade" id='history_popup_<?php echo $historyEvent->id; ?>' tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Fecha: <?php echo $historyEvent->date; ?></h4>
                </div>
                Descripcion:<br />
                <div class="modal-body">
                  <?php echo $historyEvent->description; ?>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

        <?php endforeach; ?>
    </div>
  </div>
