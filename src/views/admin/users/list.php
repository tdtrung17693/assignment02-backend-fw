<?php
/**
 * @var array $users
 * @var array $pagination
 * @var string $searchTerm
 */
?>
<?php ob_start(); ?>

<div class="row g-3 mb-4 align-items-center justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">Users</h1>
    </div>
    <div class="col-auto">
        <div class="page-utilities">
            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                <div class="col-auto">
                    <form class="table-search-form row gx-1 align-items-center" method="get">
                        <div class="col-auto">
                            <input type="text" id="search-orders" value="<?= $searchTerm ?>" name="searchTerm" class="form-control search-orders" placeholder="Search">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn app-btn-secondary">Search</button>
                        </div>
                    </form>

                </div><!--//col-->
            </div><!--//row-->
        </div><!--//table-utilities-->
    </div><!--//col-auto-->
</div>
<div class="tab-content" id="orders-table-tab-content">
    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body">
                <div class="table-responsive">
                    <table class="table app-table-hover mb-0 text-left">
                        <thead>
                            <tr>
                                <th class="cell">Username</th>
                                <th class="cell">E-mail</th>
                                <th class="cell">First Name</th>
                                <th class="cell">Last Name</th>
                                <th class="cell">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($users as $user) : ?>
                        <tr>
                            <td class="cell"><a href="/admin/users/<?= $user['id'] ?>"><?= $user['username'] ?></a></td>
                            <td class="cell"><?= $user['email'] ?></td>
                            <td class="cell"><?= $user['fname'] ?></td>
                            <td class="cell"><?= $user['lname'] ?></td>
                            <td class="cell">
                                <a class="btn-sm app-btn-secondary" href="/admin/users/<?= $user['id'] ?>">View</a>
                                <a class="btn-sm btn-danger text-white js-btn-user-delete" href="#" data-id="<?= $user['id']?>">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div><!--//table-responsive-->

            </div><!--//app-card-body-->
        </div><!--//app-card-->
        <nav class="app-pagination">
            <ul class="pagination justify-content-center">
                <li class="page-item<?= !$pagination['prev'] ? ' disabled' : '' ?>" >
                    <a class="page-link" href="/admin/users?pageNumber=<?= $pagination['current'] - 1; ?><?= $searchTerm ? "&searchTerm=$searchTerm" : ""?>" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <?php foreach($pagination['display'] as $page) : ?>
                    <?php if ($page == '...'): ?>
                        <li class="page-item"><a class="page-link disabled" href="">&hellip;</a></li>
                    <?php else : ?>
                        <li class="page-item<?= $pagination['current'] == $page ? ' active' : '' ?>"><a class="page-link" href="/admin/users?pageNumber=<?= $page ?><?= $searchTerm ? "&searchTerm=$searchTerm" : ""?>"><?= $page ?></a></li>
                    <?php endif; ?>
                <?php endforeach; ?>
                <li class="page-item<?= !$pagination['next'] ? ' disabled' : '' ?>" >
                    <a class="page-link" href="/admin/users?pageNumber=<?= $pagination['current'] + 1; ?><?= $searchTerm ? "&searchTerm=$searchTerm" : ""?>" tabindex="-1" aria-disabled="true">Next</a>
                </li>
            </ul>
        </nav><!--//app-pagination-->

    </div><!--//tab-pane-->
</div>
<?php
$content = ob_get_clean();
require __DIR__ . '/../_layout.php';