<font face="Arial">
    <div id="wrap-inner">
        <div id="khach-hang">
            <h3 style="color: #99ccff">Thông tin khách hàng</h3>
            <form method=post>
                <div class="form-group">
                    <label for="name">Name:</label>

                    <strong class="info">{{ $info['name'] }}</strong>
                </div>
                <div class="form-group">
                    <label for="email">Email address:</label>
                    <strong class="info">{{ $info['email'] }}</strong>
                </div>
                <div class="form-group">
                    <label for="phone">Telephone number:</label>
                    <strong class="info">{{ $info['phone'] }}</strong>
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <strong class="info">{{ $info['add'] }}</strong>

                </div>
            </form>
        </div>
        <div id="hoa-don">
            <h3>Hóa đơn mua hàng</h3>
            <table class="table-bordered table-responsive" style="border: 1px solid black">
                <tr class="bold">
                    <td width="30%">Tên sản phẩm</td>
                    <td width="25%">Giá</td>
                    <td width="20%">Số lượng</td>
                    <td width="15%">Thành tiền</td>
                </tr>
                @foreach($cart as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td class="price">{{number_format($item->price)}} VNĐ</td>
                    <td>{{$item->qty}}</td>
                    <td class="price">{{number_format($item->price*$item->qty,0,',','.')}} VNĐ</td>
                </tr>
                <tr></tr>
                @endforeach
                <tr>
                    <td colspan="3">Tổng tiền:</td>
                    <td class="total-price">{{$total}} VNĐ</td>
                </tr>
            </table>
        </div>
        <div id="xac-nhan">
            <br>
            <p align="justify">
                <b>Quý khách đã đặt hàng thành công!</b><br />
                • Sản phẩm của Quý khách sẽ được chuyển đến Địa chỉ có trong phần Thông tin Khách hàng của chúng Tôi sau thời gian 2 đến 3 ngày, tính từ thời điểm này.<br />
                • Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước khi giao hàng 24 tiếng.<br />
                <b><br />Cám ơn Quý khách đã sử dụng Sản phẩm của Công ty chúng Tôi!</b>
            </p>
        </div>
    </div>
</font>
