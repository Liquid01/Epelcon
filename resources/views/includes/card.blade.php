<!-- Bootstrap card wrapper -->
<style>
    .dc-card {
        width: 100%;
        max-width: 420px;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        margin-top: 20px !important;
    }

    .dc-card-body {
        padding: 0;
    }

    .dc-card-bg {
        min-height: 240px;
        background: linear-gradient(135deg, #1b2a4e 0%, #243b6b 50%, #0e1a36 100%);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        position: relative;
    }

    .dc-card-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem;
    }

    .dc-card-chip {
        width: 42px;
        height: 32px;
        border-radius: 6px;
        background: linear-gradient(135deg, #d9d9d9 0%, #b0b0b0 100%);
        position: relative;
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.6), 0 2px 6px rgba(0, 0, 0, 0.25);
    }

    .dc-card-chip::before,
    .dc-card-chip::after {
        content: "";
        position: absolute;
        background: rgba(0, 0, 0, 0.2);
    }

    .dc-card-chip::before {
        top: 6px;
        left: 6px;
        right: 6px;
        height: 2px;
    }

    .dc-card-chip::after {
        top: 14px;
        left: 6px;
        right: 6px;
        height: 2px;
    }

    .dc-card-brand {
        color: #fff;
        font-weight: 600;
        margin-left: 0.5rem;
    }

    .dc-card-visa {
        height: 22px;
    }

    .dc-card-balance {
        padding: 0 1rem;
    }

    .dc-card-balance-label {
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.85rem;
    }

    .dc-card-balance-amount {
        font-size: 2rem;
        font-weight: bold;
        color: #fff;
    }

    .dc-card-number {
        padding: 0 1rem;
        font-family: monospace;
        font-size: 1.1rem;
        letter-spacing: 2px;
        color: #fff;
    }

    .dc-card-footer {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        padding: 1rem;
    }

    .dc-card-label {
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.75rem;
    }

    .dc-card-holder {
        color: #fff;
        font-weight: 600;
    }

    .dc-card-expiry {
        text-align: right;
    }

    @media (max-width: 480px) {
        .dc-card-bg {
            min-height: auto;
            padding: 0.75rem;
        }

        .dc-card-balance-amount {
            font-size: 1.4rem;
        }

        .dc-card-number {
            font-size: 0.95rem;
            letter-spacing: 1.5px;
        }

        .dc-card-chip {
            width: 32px;
            height: 24px;
        }
    }
</style>

<div class="dc-card">
    <div class="dc-card-body">
        <div class="dc-card-bg">
            <!-- Top row -->
            <div class="dc-card-top">
                <div class="dc-card-chip"></div>
                <div class="dc-card-brand">{{auth()->user()->username}}</div>
                <img src="https://upload.wikimedia.org/wikipedia/commons/0/04/Visa.svg"
                     alt="VISA" class="dc-card-visa">
            </div>

            <!-- Balance -->
            <div class="dc-card-balance">
                <div class="dc-card-balance-label">Cash balance</div>
                <div class="dc-card-balance-amount" id="dc-card-balance">
                    ₦ {{number_format($rewards == null ? 0: $rewards->cash, 2)}}

                    <span data-target="modal-withdraw" class="modal-trigger"
                          style=" font-size: 13px!important; float: right; background: yellowgreen; padding:0 5px; border-radius: 3px; margin-left: 15px; ">
                        <small style="color:#312b21;">
                            <i class="fa fa-arrow-circle-down"></i> &nbsp;Withdraw
                        </small>
                    </span>
                </div>
            </div>

            <!-- Card number -->
            <div class="dc-card-number" id="dc-card-number">4062 3400 {{rand(4418, 5134)}} {{rand(1167, 2543) }} </div>

            <!-- Footer -->
            <div class="dc-card-footer">
                <div>
                    <div class="dc-card-label">Cardholder</div>
                    <div class="dc-card-holder"
                         id="dc-cardholder-name">{{auth()->user()->firstname}} {{auth()->user()->lastname}}</div>
                </div>
                <div class="dc-card-expiry">
                    <div class="dc-card-label">Valid thru</div>
                    <div class="dc-card-holder" id="dc-card-expiry">12/28</div>
                </div>
            </div>
        </div>
    </div>
</div>