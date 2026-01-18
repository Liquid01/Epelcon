<a data-target="modal-transfer" href="javascript:void(0);" class="modal-trigger mb-2">
    Transfer
</a>
<div id="modal-transfer" class="modal" style="max-height:300px!important;">
    <div class="modal-content">
        <h6>Transfer</h6>
        <form method="post" action="{{route('cash_to_another_account')}}">
            @csrf

            <div class="input-field">
                <label for="amount">Amount</label>
                <input type="number" min="1000" required class="input" placeholder="Enter amount" name="amount">
            </div>

            <div class="input-field">
                <label for="recipient">Recipient</label>
                <input type="text" required name="recipient" placeholder="recipient username">
            </div>

            <div class="input-field mb-10">
                <button class="btn">Transfer</button>
            </div>

        </form>

    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
    </div>
</div>