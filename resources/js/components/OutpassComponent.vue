<template>
<div class="container">
    <div class="row row-sm">
        <div class="col-lg-12 col-md-12">
            <div class="card custom-card productdesc">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-8 col-lg-12 col-md-12">
                            <div class="row">
                                <div class="col-md-10 col-sm-12">
                                    <div class="product-carousel my-2">
                                        <div id="carousel" class="carousel slide" data-bs-ride="false">
                                            <div class="carousel-inner border">
                                                <StreamBarcodeReader
                                                    @decode="(a, b, c) => onDecode(a, b, c)"
                                                    @loaded="() => onLoaded()"
                                                >
                                                </StreamBarcodeReader>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-12 col-md-12">
                            <div class="text-center">
                                <form>
                                    <div class="form-group text-start">
                                        <input class="form-control" placeholder="Enter Outpass" type="text" :value="text">
                                    </div>
                                    <a class="btn btn-primary btn-block" href="index.html">Submit Outpass</a>
                                </form>
                                Input Value: {{ text || "Nothing" }}
                            </div>
                        </div>
                    </div>
                </div>
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