<div id="modal-withdraw" class="modal modal-fixed-footer" style="max-height:250px!important;">
    <div class="modal-content">
        <div class="flex" style="display: flex; justify-content:left; ">
            <h6>Withdrawal Request</h6>
            <span class="modal-action modal-close"><i class="fa fa-times-circle" style=" position: absolute; top:10px; right: 15px; color:red;margin-top:12px; margin-left: 10px"></i></span>

        </div>
        <form method="post" action="{{route('member_withdraw')}}">
            @csrf

            <div class="input-field mb-10">
                <label for="amount">Enter Amount</label>
                <input type="number" min="1000" required name="amount">
                <button class="btn btn-success">Withdraw</button>

            </div>
            <div class="row">
                <p><strong>NOTE:</strong></p>
                <p>
                    Withdrawals are processed within 24 Hours;
                    Ensure your <span style="color:orangered">Account Details are correct</span> -  they can only be changed once.
                    After that, you have to notify the support/customer service for edits.
                </p>
            </div>

        </form>
    </div>
</div>