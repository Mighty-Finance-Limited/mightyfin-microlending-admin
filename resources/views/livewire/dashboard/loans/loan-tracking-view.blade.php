<div class="content-body">
    <div class="container-fluid">
        <div class="bg-white p-3" style="border-radius: 16px;
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
            <h1>Loan Repayment Tracker</h1>
            <h3>{{ $loan->application->type}} Loan</h3>
            <p>{{ $loan->application->fname.' '.$loan->application->lname}}
            | Total Collectable K {{ App\Models\Application::payback($loan->application->amount, $loan->application->repayment_plan)}}
                
                @if($loan->closed == 1)
                    <span class="badge badge-xxl light badge-info">
                        Paid & Closed
                    </span>
                @else
                    <span class="badge badge-xxl light badge-warning">
                        Pending Repayments
                    </span>
                @endif
            </p>
            <p>Outstanding Balance  K{{ App\Models\Loans::loan_balance($loan->application->id) }} </p>
            <p>Repayment Duration {{ $loan->application->repayment_plan }} Month{{ $loan->application->repayment_plan > 1 ? 's' : '' }}</p>
        </div>
        <div style="
            border-radius: 16px;
            box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
            " class=" bg-white mt-2 col-xl-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="history-tl-container bg-white">
              <ul class="tl">
                @forelse ($loan->loan_installments as $key => $installment)
                    <li class="tl-item" ng-repeat="item in retailer_history">
                        <div class="timestamp">
                            @php 
                                $date_str = $installment->next_dates;
                                $date = DateTime::createFromFormat('Y-m-d H:i:s', $date_str);
                                echo $date->format('F j, Y, g:i a');
                            @endphp
                        </div>
                        <div class="item-title"><b>Installment #{{$key + 1}}</b></div>
                        <div class="item-title"><b>K{{$installment->amount ?? App\Models\Application::monthly_installment($loan->application->amount, $loan->application->repayment_plan) }}</b></div>
                        <div class="item-detail">
                            @if($installment->paid_at != null)
                            <span class="badge badge-xxl light badge-success">
                                Paid
                            </span>
                            @else
                                @if($loan->closed == 1)
                                    <span class="badge badge-xxl light badge-success">
                                        Paid
                                    </span>
                                @else
                                    <span class="badge badge-xxl light badge-default">
                                        Pending
                                    </span>
                                @endif
                            @endif
                        </div>
                    </li>
                @empty
                    
                @endforelse
                {{-- <li class="tl-item" ng-repeat="item in retailer_history">
                  <div class="timestamp">
                    19th March 2015<br> 3:00 PM
                  </div>
                  <div class="item-title">Kill some Orcs</div>
                  <div class="item-detail">Don't enter the caves!!</div>
                </li>
                <li class="tl-item" ng-repeat="item in retailer_history">
                  <div class="timestamp">
                    1st June 2015<br> 7:00 PM
                  </div>
                  <div class="item-title">Throw that goddamn ring in the lava</div>
                  <div class="item-detail">Also, throw that Gollum too</div>
                </li> --}}
              </ul>
            
            </div>
        </div>

    </div>
</div>
<style>
/* body{
  line-height:1.3em;
  min-width:920px;
} */
.history-tl-container{
font-family: "montserrat",sans-serif;
  width:50%;
  margin:auto;
  display:block;
  position:relative;
}
.history-tl-container ul.tl{
    margin:20px 0;
    padding:0;
    display:inline-block;

}
.history-tl-container ul.tl li{
    list-style: none;
    margin:auto;
    margin-left:200px;
    min-height:50px;
    /*background: rgba(255,255,0,0.1);*/
    border-left:1px dashed #86D6FF;
    padding:0 0 50px 30px;
    position:relative;
}
.history-tl-container ul.tl li:last-child{ border-left:0;}
.history-tl-container ul.tl li::before{
    position: absolute;
    left: -18px;
    top: -5px;
    content: " ";
    border: 8px solid rgba(255, 255, 255, 0.74);
    border-radius: 500%;
    background: #258CC7;
    height: 20px;
    width: 20px;
    transition: all 500ms ease-in-out;

}
.history-tl-container ul.tl li:hover::before{
    border-color:  #258CC7;
    transition: all 1000ms ease-in-out;
}
ul.tl li .item-title{
}
ul.tl li .item-detail{
    color:rgba(0,0,0,0.5);
    font-size:18px;
}
ul.tl li .timestamp{
    color: #681212;
    position: absolute;
    width:100px;
    left: -110%;
    text-align: right;
    font-size: 14px;
}
</style>
