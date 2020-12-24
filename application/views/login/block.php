<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- 404 Error Text -->
          <div class="text-center">
            <div class="error mx-auto" data-text="404">404</div>
            <p class="lead text-gray-800 mb-5">Page Not Found</p>
            <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>

            <?php if($level == 1): ?>
              <a href="<?= base_url('admn'); ?>">&larr; Back to Dashboard</a>
            <?php elseif($level == 2): ?>
              <a href="<?= base_url('admn'); ?>">&larr; Back to Dashboard</a>
            <?php elseif($level == 3): ?>
              <a href="<?= base_url('admn'); ?>">&larr; Back to Dashboard</a>
            <?php elseif($level == 'cpdb'): ?>  
              <a href="<?= base_url('admn'); ?>">&larr; Back to Dashboard</a>
            <?php endif; ?>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->