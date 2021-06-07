<script>
    /* globals Swal */
</script>
<?php
/**
 * @var array $user
 * @var array $pagination
 * @var SessionManager $SESSION_MANAGER
 */

?>
<?php ob_start(); ?>

<div class="row g-3 mb-4 align-items-center justify-content-between">
    <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
        <div class="app-card-header p-3 border-bottom-0">
            <div class="row align-items-center gx-3">
                <div class="col-auto">
                    <div class="app-icon-holder">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-box" viewBox="0 0 16 16">
                            <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5 8 5.961 14.154 3.5 8.186 1.113zM15 4.239l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
                        </svg>
                    </div><!--//icon-holder-->

                </div><!--//col-->
                <div class="col-auto">
                    <h4 class="app-card-title">User: <?= $user['username'] ?></h4>
                </div><!--//col-->
            </div><!--//row-->
        </div><!--//app-card-header-->
        <div class="app-card-body p-4 w-100">
            <?php if ($SESSION_MANAGER->get('form_errors')) $formErrors = $SESSION_MANAGER->get('form_errors'); ?>
            <form class="product-form needs-validation" method="post" action="/admin/users/<?= $user["id"]; ?>">
                <input type="hidden" name="_method" value="put"/>
                <div class="mb-3">
                    <label for="product-name" class="form-label">Username</label>
                    <input type="text" class="form-control" id="product-name"
                           name="productName"
                           value="<?= $user['username'] ?>"
                           disabled
                           required="">
                </div>
                <div class="mb-3">
                    <label for="product-price" class="form-label">E-mail</label>
                    <input type="text" class="form-control" id="product-price"
                           name="productPrice"
                           value="<?= $user['email']; ?>"
                           disabled
                           required="">
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-6">
                            <label for="description" class="form-label">First Name</label>
                            <input type="text"
                                   disabled
                                   name="productDescription"
                                   class="form-control"
                                   id="description"
                                   style="height: unset;" value="<?= $user['fname'] ?>">
                        </div>
                        <div class="col-6">
                            <label for="description" class="form-label">Last Name</label>
                            <input type="text"
                                   disabled
                                   name="productDescription"
                                   class="form-control"
                                   id="description"
                                   style="height: unset;" value="<?= $user['lname'] ?>">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Birthdate</label>
                    <input type="date"
                           disabled
                           name="productDescription"
                           class="form-control"
                           id="description"
                           style="height: unset;" value="<?= $user['bdate'] ?>">
                </div>
            </form>
        </div><!--//app-card-body-->
    </div>
</div>
<?php
$content = ob_get_clean();
require __DIR__ . '/../_layout.php';
