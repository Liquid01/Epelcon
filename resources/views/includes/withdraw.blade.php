<button data-target="modal-withdraw"
        class="modal-trigger waves-effect waves-light btn btn-small gradient-45deg-red-pink z-depth-4 mb-2">
    Withdraw
</button>
<div id="modal-withdraw" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h6>Withdrawal Request</h6>
        <form method="post" action="{{route('member_withdraw')}}">
            @csrf

            <div class="input-field mb-10">
                <label for="amount">Enter Amount</label>
                <input type="number" min="1" required name="amount">
                <button class="btn btn-success">Withdraw</button>

            </div>

        </form>

    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
    </div>
</div>