<div id="financeModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Finance Example</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-10 col-sm-6 mb-2"><img class="carimage"
                                                           src=""
                                                           alt="" width="100%">
                        <span class="carname">TEST</span><br/>
                        <span><strong>&pound;<span
                                                   class="weeklyprice"></span> per week</strong></span> with
                        <span><strong>&pound;<span
                                                   class="deposit"></span> deposit</strong></span>
                    </div>
                    <div class="col-12 col-sm-6 pl-1">
                        <div class="oc-modal-body" style="color: black; text-align: left;">
                            <p>Cash Price<span class="float-right">&pound;<span
                                                                                class="cashprice"></span></span></p>
                            <p>Deposit<span class="float-right">&pound;<span
                                                                             class="deposit"></span></span></p>
                            <p>Credit amount<span class="float-right">&pound;<span
                                                                                   class="creditamount"></span></span></p>
                            <p>Final payment<span class="float-right">&pound;<span
                                                                                   class="finalpayment"></span></span></p>
                            <p>Monthly amount<span class="float-right">&pound;<span
                                                                                    class="monthlyamount"></span></span></p>
                            <p>APR<span class="float-right"><span
                                                                  class="apr"></span>&percnt; (Fixed)</span></p>
                            <p>Total amount<span class="float-right">&pound;<span
                                                                                  class="totalamount"></span> (Inc Deposit)</span></p>
                            <p>Per week<span class="float-right">&pound;<span
                                                                              class="weeklyprice"></span></span></p>
                            <p>Finance term months<span class="float-right"><span
                                                                                  class="term"></span></span></p>
                            <p>Representative APR<span class="float-right"><span
                                            class="representativeapr"></span><?php echo get_option('cns_representative_apr'); ?>&percnt;</span></p>
                        </div>
                    </div>
                    <div class="col-12">
                        <p>Representative Example<span class="float-right"><span
                                        class="representativeexample"></span></span>
						<br>The Trade Centre Group PLC is a credit broker not a lender.
						</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <!--    <a class="btn btn-primary btn-block" href="javascript:void(0);" id="oc-modal-link">Free Finance
                    Check
                    &nbsp;<i
                             class="fa fa-lg fa-angle-right"></i></a> -->
                <a class="btn btn-primary btn-block" href="/finance-check">Free Finance Check</a>
            </div>
        </div>

    </div>
</div>

<div id="onehourModal" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width:800px">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Drive Away today</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 mb-2">
                        <div style="padding:56.25% 0 0 0;position:relative;">
                            <iframe src="https://player.vimeo.com/video/460906836?title=0&byline=0&portrait=0"
                                    style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0"
                                    allow="autoplay; fullscreen" allowfullscreen></iframe>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
             <!--   <a class="btn btn-primary btn-block" href="javascript:void(0);" id="oc-modal-link1">Free Finance
                    Check
                    &nbsp;<i
                             class="fa fa-lg fa-angle-right"></i></a> -->
                <a class="btn btn-primary btn-block" href="/finance-check">Free Finance Check</a>
            </div>
        </div>
    </div>
</div>
