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
                        <h4 class="app-card-title">Product: <?= $product['product_name'] ?></h4>
                    </div><!--//col-->
                </div><!--//row-->
            </div><!--//app-card-header-->
            <div class="app-card-body p-4 w-100">
                <?php if ($SESSION_MANAGER->get('form_errors')) $formErrors = $SESSION_MANAGER->get('form_errors'); ?>
                <form class="product-form needs-validation" method="post" action="/admin/products/<?= $product["id"]; ?>">
                    <input type="hidden" name="_method" value="put"/>
                    <div class="mb-3">
                        <?php $isInvalid = isset($formErrors) && array_key_exists("productName", $formErrors); ?>
                        <label for="product-name" class="form-label">Product Name</label>
                        <input type="text" class="form-control <?= $isInvalid ? "is-invalid" : "" ?>" id="product-name"
                               name="productName"
                               value="<?= $product['product_name'] ?>"
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
                               value="<?= $product['product_price']; ?>"
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
                                  style="height: unset;"><?= $product['description'] ?></textarea>
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
        <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
            <div class="app-card-header p-3 border-bottom-0">
                <div class="row align-items-center gx-3">
                    <div class="col-auto d-flex align-items-center">
                        <h4 class="app-card-title mr-2">Product Images</h4>
                        <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#newImageModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-plus" viewBox="0 0 16 16">
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>
                        </a>
                    </div><!--//col-->
                </div><!--//row-->
            </div><!--//app-card-header-->
            <div class="app-card-body p-4 w-100">
                <div class="product-images">
                    <?php if (!empty($images)) : ?>
                        <?php foreach ($images as $index => $image): ?>
                            <div class="product-image">
                                <img src="<?= $image['image_path'] ?>" alt="thumbnail-<?= $index ?>" class="img-thumbnail">
                                <div class="overlay">
                                    <a href="#" class="btn-img-delete" data-id="<?= $image['id'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                        </svg></a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <span class="text-muted">No image added yet.</span>
                    <?php endif ?>
                </div>
            </div><!--//app-card-body-->

        </div>
    </div>

    <!-- New image modal -->
    <div class="modal fade" id="newImageModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add new product image</h5>
                    <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form action="/admin/products/<?= $product['id'] ?>/images" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        <div class="mb-3 ">
                            <label for="imageFile" class="form-label">Image</label>
                            <input class="form-control"
                                   style="height: unset; padding: .375rem .75rem; min-height: unset;" type="file"
                                   name="imageFile"
                                   id="imageFile">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
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
