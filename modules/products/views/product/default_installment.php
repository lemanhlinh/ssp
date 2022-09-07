<div class="head-ins-products">
    <p class="mbl">
        <span class="fa-stack fa-2x">
            <i class="fas fa-circle fa-stack-2x"></i> 
            <i class="far fa-money-bill-alt fa-stack-1x fa-inverse"></i>
        </span><b>Giá máy <span class="text-price" id="price-tab-3"><?php echo format_money($data->price); ?></span></b>
    </p>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mbl">
            <p><span class="fa-stack fa-2x">
                <i class="fas fa-circle fa-stack-2x"></i> 
                <i class="fas fa-inbox fa-stack-1x fa-inverse"></i>
            </span><b>Chọn gói trả góp (0% chỉ áp dụng cho trả góp bằng thẻ tín dụng):</b></p>
            <div class="pal"><div class="price-procent"></div></div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mbl">
            <p><span class="fa-stack fa-2x">
                    <i class="fas fa-circle fa-stack-2x"></i> 
                    <i class="fas fa-history fa-stack-1x fa-inverse"></i>
                </span><b>Thời hạn vay (tháng)</b></p>
            <div class="pal"><div class="month-pay"></div></div>
            <p><b>Thời hạn 3 tháng chỉ áp dụng cho trả góp qua thẻ tín dụng hoặc Fecredit</b></p>
        </div>
    </div>
</div>

<div class="bank-caculate-row2 clearfix">
            <div class="border-bank">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="left-ins-ft">
                            <div class="left-tragop">
                                <span class="fa-stack fa-2x">
                                    <i class="fas fa-circle fa-stack-2x"></i> 
                                    <i class="fas fa-credit-card fa-stack-1x fa-inverse"></i>
                                </span> 
                                Trả góp bằng tiền mặt
                                <img src="<?php echo URL_ROOT."modules/installment/assets/images/tragop_02.png" ?>" class="img-responsive home-credit">
                                <img src="<?php echo URL_ROOT."modules/installment/assets/images/tragop_04.png" ?>" class="img-responsive">
                            </div>
                            <ul>
                                <li><b>% trả trước:<span id="procent">0</span></b></li>
                                <li><b>Số tiền trả trước(VNĐ): <span id="first-pay">0</span></b></li>
                                <li><b>Số tiền trả hàng tháng (VNĐ): <span id="monthly">0</span></b></li>
                                <li><b>Thủ tục cần có:</b> Từ 20 - 65 tuổi. Cần CMND + Bằng lái (hoặc Hộ Khẩu)</li>
                                <li>
                                    Ghi chú: Kết quả tính toán này chỉ mang tính chất tham khảo và có thể sai lệch
                                    nhỏ với kết quả tính toán thực tế tại các showroom OneWay Mobile.
                                </li>
                            </ul>                        
                        </div>
                    </div>
                    
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="right-ins-ft">
                            <div class="left-tragop">
                                <span class="fa-stack fa-2x">
                                    <i class="fas fa-circle fa-stack-2x"></i> 
                                    <i class="fas fa-credit-card fa-stack-1x fa-inverse"></i>
                                </span>
                                Trả góp bằng thẻ tín dụng
                                <img src="<?php echo URL_ROOT."modules/installment/assets/images/tragop_07.png" ?>" class="img-responsive">
                            </div>
                            <div class="row mbl">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <p><b>Chọn ngân hàng:</b></p>
                                    <select class="form-control" name="bankId" id="bankId">
                                        <option value="" disabled="" selected="">Ngân hàng trả góp</option>
                                        <option value="24">ACB (Ngân hàng TMCP Á Châu)</option>
                                        <option value="21">BIDV (Ngân hàng TMCP Đầu tư và Phát triển Việt Nam)</option>
                                        <option value="13">Citibank (NH Citibank Việt Nam)</option>
                                        <option value="9">EximBank (NH TMCP Xuất khẩu VN)</option>
                                        <option value="16">FECredit (FE Credit)</option>
                                        <option value="4">HSBC (Ngân hàng TNHH một thành viên HSBC (Việt Nam))</option>
                                        <option value="18">KienLongBank (Ngân Hàng KIENLONG Bank)</option>
                                        <option value="23">MBBank (Ngân hàng Quân đội)</option>
                                        <option value="10">Maritimebank (Ngân hàng TMCP Hàng Hải Việt Nam)</option>
                                        <option value="5">NamA (NH Nam Á)</option>                                    
                                        <option value="17">OCB (Ngân Hàng Phương Đông OCB)</option>
                                        <option value="15">SCB (Ngân Hàng TMCP Sài Gòn )</option>
                                        <option value="20">SHB (Ngân Hàng TMCP Sài Gòn- Hà Nội)</option>
                                        <option value="7">SHBVN (Ngân hàng TNHH MTV Shinhan Việt Nam + ANZ )</option>
                                        <option value="1">Sacombank (Ngân hàng thương mại cổ phần Sài Gòn Thương Tín)</option>
                                        <option value="6">SeABank (NH Đông Nam Á)</option>
                                        <option value="14">StandardChartered (Ngân Hàng Standard Chartered)</option>
                                        <option value="19">TPBank (Ngân Hàng TMCP Tiên Phong)</option>
                                        <option value="11">Techcombank (Ngân hàng TMCP Kỹ thương Việt Nam)</option>
                                        <option value="8">VIB (NH Quốc tế)</option>
                                        <option value="22">VIETCOMBANK (Ngân hàng thương mại cổ phần Ngoại thương Việt Nam)</option>
                                        <option value="2">VPBank (NH Việt Nam Thịnh Vượng)</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <p><b>Chọn loại thẻ:</b></p>
                                    <select class="form-control" name="cardType" id="cardType" disabled>
                                        <option value="" disabled="" selected="">Chọn loại thẻ</option>
                                        <option value="JCB_LOCAL">JCB nội địa</option>
                                        <option value="VISA_LOCAL">Visa nội địa</option>
                                        <option value="MASTER_LOCAL">Master nội địa</option>
                                        <option value="CUP_LOCAL">CUP nội địa</option>
                                        <option value="VISA_LOCAL">Visa nội địa</option>
                                        <option value="MASTER_LOCAL">Master nội địa</option>
                                    </select>
                                </div>
                            </div>
                        <div>
                            <ul>
                                <li><b>Số tiền trả trước(VNĐ):<span id="bank-procent">0</span></b></li>
                                <li><b>Số tiền trả hàng tháng (VNĐ):<span id="auto-caculate"><i class="fas fa-sync fa-spin" id="loading-image"></i>0</span></b></li>
                                <li><b>Thủ tục cần có:</b> Chỉ áp dụng cho khách hàng có thẻ tín dụng</li>
                                <li>
                                    Ghi chú: Kết quả tính toán này chỉ mang tính chất tham khảo và có thể sai lệch 
                        nhỏ với kết quả tính toán thực tế tại các showroom OneWay Mobile.
                                </li>
                            </ul>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>