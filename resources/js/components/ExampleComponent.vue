<template>
    		<div class="row signpages text-center">
    			<div class="col-md-12">
    				<div class="card border-0">
    					<div class="row row-sm">
    						<div class="col-lg-6 col-xl-6 col-xs-12 col-sm-12 login_form rounded-start-11">
    							<div class="container-fluid">
    								<div class="row row-sm">
    									<div class="card-body mt-2 mb-2">
    										<h2 class="text-start mb-2">Forgot Password</h2>
    										<p class="mb-3 text-muted tx-13 ms-0 text-start">Don't worry! We will help you to recover your password.</p>
    										<form>
    											<div class="form-group text-start">
    												<label class="tx-medium">Enter the Email Address associated with your account</label>
    												<input class="form-control" placeholder="Enter email" type="email" autocomplete="username" value="">
    											</div>
    											<a class="btn btn-primary btn-block" href="index.html">Request reset link</a>
    										</form>
    									</div>
    								</div>
    							</div>
    						</div>
    					</div>
                        <div>
                             <StreamBarcodeReader
          @decode="(a, b, c) => onDecode(a, b, c)"
          @loaded="() => onLoaded()"
        ></StreamBarcodeReader>
         Input Value: {{ text || "Nothing" }}
                        </div>
    				</div>
    			</div>
    		</div>
</template>

<script>
import { StreamBarcodeReader } from "vue-barcode-reader";

export default {
    components: {
        StreamBarcodeReader,
    },
    mounted() {
        console.log('Component mounted.');
    },
    data() {
        return {
            text: "",
            id: null,
        };
    },
    props: {
        msg: String,
    },
    methods: {
        onDecode(a, b, c) {
            console.log(a, b, c);
            this.text = a;
            if (this.id) clearTimeout(this.id);
            this.id = setTimeout(() => {
                if (this.text === a) {
                    this.text = "";
                }
            }, 5000);
        },
        onLoaded() {
            console.log("load");
        },
    }
}
</script>