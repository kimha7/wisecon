<div class="br-logo"><a href=""><span>[</span><i>loan</i>system<span>]</span></a></div>
<div class="br-sideleft sideleft-scrollbar">
  <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
  <ul class="br-sideleft-menu">
    <li class="br-menu-item">
      <a href="<?php echo e(route('home')); ?>" class="br-menu-link">
        <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
        <span class="menu-item-label">Dashboard</span>
      </a><!-- br-menu-link -->
    </li><!-- br-menu-item -->
    <?php if( Auth::user()->can('manage-loans') ): ?>
      <li class="br-menu-item">
        <a href="#" class="br-menu-link with-sub">
          <i class="menu-item-icon icon ion-ios-color-filter-outline tx-24"></i>
          <span class="menu-item-label">Applications</span>
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub">
          <?php if( Auth::user()->can('create-loans') ): ?>
            <li class="sub-item"><a href="<?php echo e(route('clients.create')); ?>" class="sub-link">New Application</a></li>
          <?php endif; ?>
          <li class="sub-item"><a href="<?php echo e(route('clients.index')); ?>" class="sub-link">All Applicants</a></li>
        </ul>
      </li><!-- br-menu-item -->
      <?php if( Auth::user()->can('manage-clients') ): ?>
      <li class="br-menu-item">
        <a href="#" class="br-menu-link with-sub">
          <i class="menu-item-icon icon ion-ios-color-filter-outline tx-24"></i>
          <span class="menu-item-label">Groups</span>
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub">
          <li class="sub-item"><a href="<?php echo e(route('groups.create')); ?>" class="sub-link">Add new group</a></li>
          <li class="sub-item"><a href="<?php echo e(route('groups.index')); ?>" class="sub-link">All groups</a></li>
        </ul>
      </li><!-- br-menu-item -->
    <?php endif; ?>
    <?php endif; ?>
    <?php if( Auth::user()->can('manage-loans', 'read-loans') ): ?>
      <li class="br-menu-item">
        <a href="#" class="br-menu-link with-sub">
          <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
          <span class="menu-item-label">Loans</span>
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub">
          <li class="sub-item"><a href="<?php echo e(route('loans.index' )); ?>" class="sub-link">All Loans</a></li>
        </ul>
      </li><!-- br-menu-item -->
    <?php endif; ?>
    <?php if( Auth::user()->can('manage-users') ): ?>
      <li class="br-menu-item">
        <a href="#" class="br-menu-link with-sub">
          <i class="menu-item-icon icon ion-ios-briefcase-outline tx-22"></i>
          <span class="menu-item-label">System Users</span>
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub">
          <li class="sub-item"><a href="<?php echo e(route('users.create')); ?>" class="sub-link">Add System User</a></li>
          <?php if( Auth::user()->hasRole( 'general_manager' ) ): ?>
            <li class="sub-item"><a href="<?php echo e(route('user.index')); ?>" class="sub-link">All Users</a></li>
          <?php endif; ?>

        </ul>
      </li><!-- br-menu-item -->

    <?php endif; ?>
    <?php if( Auth::user()->can('manage-finance') ): ?>
      <li class="br-menu-item">
        <a href="<?php echo e(route('finance.index')); ?>" class="br-menu-link">
          <i class="menu-item-icon icon ion-ios-paper-outline tx-22"></i>
          <span class="menu-item-label">Finance</span>
        </a><!-- br-menu-link -->
      </li><!-- br-menu-item -->
    <?php endif; ?>
    <?php if( Auth::user()->can('manage-reports') ): ?>
      <li class="br-menu-item">
        <a href="#" class="br-menu-link with-sub">
          <i class="menu-item-icon icon ion-ios-briefcase-outline tx-22"></i>
          <span class="menu-item-label">Reports</span>
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub">
          <li class="sub-item"><a href="<?php echo e(route('clients.index')); ?>" class="sub-link">All Applicants</a></li>

          <li class="sub-item"><a href="<?php echo e(route('groups.index')); ?>" class="sub-link">All groups</a></li>

          <li class="sub-item"><a href="<?php echo e(route('loans.index' )); ?>" class="sub-link">All Loans</a></li>

        </ul>
      </li><!-- br-menu-item -->
  <?php endif; ?>
  </ul><!-- br-sideleft-menu -->
  <br>
</div><!-- br-sideleft -->
