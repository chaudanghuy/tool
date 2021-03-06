<div id="page-wrapper">
    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tables</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Doanh nghiệp</th>
                                            <th>Đường dẫn</th>
                                            <th>Người tạo</th>
                                            <th>Ngày tạo</th>
                                            <th>Chỉnh sửa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($data as $row): ?>
                                        <tr class="odd gradeX">
                                            <td><?=$row['site']; ?></td>
                                            <td><?=$row['url']; ?></td>
                                            <td><?=$row['people_id']; ?></td>
                                            <td><?=$row['date_created']; ?></td>
                                            <td>
                                                <a href="news/edit.php" class="btn btn-default btn-xs">
                                                    <span class="glyphicon glyphicon-pencil"></span>
                                                    Chỉnh sửa
                                                </a>
                                                <a href="news/delete.php"  class="btn btn-default btn-xs">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                    Xóa
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>                
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            <div class="well">
                                <h4>DataTables Usage Information</h4>
                                <p>DataTables is a very flexible, advanced tables plugin for jQuery. In SB Admin, we are using a specialized version of DataTables built for Bootstrap 3. We have also customized the table headings to use Font Awesome icons in place of images. For complete documentation on DataTables, visit their website at <a target="_blank" href="https://datatables.net/">https://datatables.net/</a>.</p>
                                <a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">View DataTables Documentation</a>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
</div>

</div>