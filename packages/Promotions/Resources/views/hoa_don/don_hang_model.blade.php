<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Danh sách đơn hàng bán</h4>
                <div class="col-md-6">
                    <select class="form-control d-none d-lg-block m-l-15">
                        <option>Lọc theo khách hàng</option>
                        <option>Đại lý Tây Ninh</option>
                        <option>Đại lý Tây Ninh 01</option>
                        <option>Đại lý Tây Ninh 02</option>
                    </select>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover product-overview">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <input type="checkbox" class="check" id="minimal-checkbox-1">
                                                </th>
                                                <th>Ngày</th>
                                                <th>Chứng Từ</th>
                                                <th class="text-center">Giá Trị</th>
                                                <th>Ngày Giao Hàng</th>
                                                <th>Khách Hàng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @for($i = 1; $i <= 10; $i++)
                                            <tr>
                                                <td><input type="checkbox" class="check" id="minimal-checkbox-1"></td>
                                                <td>10-7-2017</td>
                                                <td><a href="#">Đơn hàng SO001</a></td>
                                                <td class="text-right"><a href="#">1.000.000 đ</a></td>
                                                <td>10-7-2017</td>
                                                <td>Nguyễn Văn A</td>
                                            </tr>
                                            @endfor
                                        </tbody>
                                    </table>
                                </div>
                                <div class="btn-toolbar pull-right">
                                    <div class="btn-group mr-2" role="group" aria-label="First group">
                                        <button type="button" class="btn btn-secondary disabled btn-info">1</button>
                                        <button type="button" class="btn btn-secondary">2</button>
                                        <button type="button" class="btn btn-secondary">3</button>
                                        <button type="button" class="btn btn-secondary">4</button>
                                    </div>
                                    <div class="btn-group mr-2" role="group" aria-label="Second group">
                                        <button type="button" class="btn btn-secondary">5</button>
                                        <button type="button" class="btn btn-secondary">6</button>
                                        <button type="button" class="btn btn-secondary">7</button>
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Third group">
                                        <button type="button" class="btn btn-secondary">8</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info waves-effect text-left" data-dismiss="modal">Thêm vào hóa đơn</button>
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>