<script>
    /* globals Swal */
</script>
<?php
/**
 * @var array $product
 * @var array $images
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
                    <h4 class="app-card-title">New product</h4>
                </div><!--//col-->
            </div><!--//row-->
        </div><!--//app-card-header-->
        <div class="app-card-body p-4 w-100">
            <?php if ($SESSION_MANAGER->get('form_errors')) $formErrors = $SESSION_MANAGER->get('form_errors'); ?>
            <form class="product-form needs-validation" method="post" action="/admin/products">
                <div class="mb-3">
                    <?php $isInvalid = isset($formErrors) && array_key_exists("productName", $formErrors); ?>
                    <label for="product-name" class="form-label">Product Name</label>
                    <input type="text" class="form-control <?= $isInvalid ? "is-invalid" : "" ?>" id="product-name"
                           name="productName"
                           required="">
                    <?php if ($isInvalid) :?>
                        <div class="invalid-feedback">
                            <?= $formErrors["productName"] ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <?php $isInvalid = isset($formErrors) && array_key_exists("productPrice", $formErrors); ?>
                    <label for="product-price" class="form-label">Product Price</label>
                    <input type="text" class="form-control <?= $isInvalid ? "is-invalid" : "" ?>" id="product-price"
                           name="productPrice"
                           required="">
                    <?php if ($isInvalid) :?>
                        <div class="invalid-feedback">
                            <?= $formErrors["productPrice"] ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <?php $isInvalid = isset($formErrors) && array_key_exists("productDescription", $formErrors); ?>
                    <label for="description" class="form-label">Description</label>
                    <textarea name="productDescription" class="form-control <?= $isInvalid ? "is-invalid" : "" ?>" id="description" rows="5" cols="100"
                              style="height: unset;"></textarea>
                    <?php if ($isInvalid) :?>
                        <div class="invalid-feedback">
                            <?= $formErrors["productDescription"] ?>
                        </div>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn app-btn-primary">Save Changes</button>
            </form>
        </div><!--//app-card-body-->

    </div>
</div>

<?php $error = $SESSION_MANAGER->get("error"); ?>
<?php if ($error) : ?>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '<?= $error ?>',
            })
        })
    </script>
<?php endif ?>
<?php $SESSION_MANAGER->set("error", "") ?>
<?php $SESSION_MANAGER->set("form_errors", []) ?>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        $('.btn-img-delete').on('click', function (ev) {
            ev.preventDefault();
            const imageEl = $(this).parents(".product-image");
            console.log(imageEl)
            const imgId = $(this).data('id');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/admin/products/<?= $product['id'] ?>/images/${imgId}`, {
                        method: 'delete'
                    })
                        .then(ret => ret.json())
                        .then(ret => {
                            if (ret.success) {
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                ).then(() => window.location.reload())
                            } else if (ret.error) {
                                Swal.fire(
                                    'Failed!',
                                    ret.error,
                                    'danger'
                                )
                            }
                        })

                }
            })
        })
    })
</script>
<?php
$content = ob_get_clean();
require __DIR__ . '/../_layout.php';
