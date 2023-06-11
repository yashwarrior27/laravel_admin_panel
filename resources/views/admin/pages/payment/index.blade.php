<div class="card card-default">
    <div class="card-header">
        Laravel - Razorpay Payment Gateway Integration
    </div>
    <div class="card-body text-center">
        <form action="" method="POST" >
            @csrf
            <script src="https://checkout.razorpay.com/v1/checkout.js"
                    data-key="{{ env('RAZORPAY_KEY') }}"
                    data-amount="100"
                    data-buttontext="Pay 100 INR"
                    data-name="GeekyAnts official"
                    data-description="Razorpay payment"
                    data-image="{{url('/images/logo.jpeg')}}"
                    data-prefill.name="ABC"
                    data-prefill.email="abc@gmail.com"
                    data-theme.color="#ff7529">
            </script>
        </form>
    </div>
</div>
