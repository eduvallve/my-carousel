<?php
function headingCells() {
    echo '<tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">Shortcode</th>
        <th scope="col">Actions</th>
    </tr>';
}
?>
<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
<a href="?page=my-carousel&tab=carousel-edit" class="page-title-action">Add New Carousel</a>
<div id="mc__admin--list">
    <div class="col-container">
        <table class="striped widefat">
            <thead>
                <?php headingCells(); ?>
            </thead>
            <tbody>
                <?php /* createPostListByType($postType, $allPostListData); */ ?>
                <tr class="mc__admin--item">
                    <td>a</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
            <tfoot>
                <?php headingCells(); ?>
            </tfoot>
        </table>
    </div>
</div>