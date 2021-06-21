<template>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div
        class="
          bg-white
          overflow-hidden
          shadow-xl
          sm:rounded-lg
          flex
          justify-center
        "
      >
        <form @submit.prevent="purchase" class="card-form mt-3 mb-3">
          <input
            type="hidden"
            v-model="payment_method"
            class="payment-method"
          />
          <input
            class="StripeElement mb-3"
            v-model="card_holder_name"
            placeholder="Card holder name"
          />
          <div class="col-lg-4 col-md-6">
            <div id="card-element"></div>
          </div>
          <div id="card-errors" role="alert"></div>
          <div class="form-group mt-3">
            <button
              type="submit"
              class="
                px-4
                py-2
                bg-blue-500
                hover:bg-blue-700
                text-white
                rounded
                pay
              "
            >
              Purchase
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import { usePage } from "@Inertiajs/Inertia-vue3";
import { computed } from "Vue";

export default {
  setup() {
    const cart = computed(() => usePage().props.value.cart);
    const stripeKey = computed(() => usePage().props.value.stripeKey);

    return { cart, stripeKey };
  },
  data() {
    return {
      stripe: "",
      elements: "",
      card: "",
      form: {
        card_holder_name: null,
        payment_method: null,
      },
    };
  },
  props: {
    intent: Object,
  },
  components: {
    AppLayout,
  },
  mounted() {
    this.includeStripe(
      "js.stripe.com/v3/",
      function () {
        this.configureStripe();
      }.bind(this)
    );
  },
  methods: {
    includeStripe(URL, callback) {
      let documentTag = document,
        tag = "script",
        object = documentTag.createElement(tag),
        scriptTag = documentTag.getElementsByTagName(tag)[0];
      object.src = "//" + URL;
      if (callback) {
        object.addEventListener(
          "load",
          function (e) {
            callback(null, e);
          },
          false
        );
      }
      scriptTag.parentNode.insertBefore(object, scriptTag);
    },
    configureStripe() {
      this.stripe = Stripe(this.stripeKey);

      this.elements = this.stripe.elements();
      this.card = this.elements.create("card");

      this.card.mount("#card-element");
    },
    purchase() {
      let total = this.cart.products.reduce(
        (sum, product) => sum + product.sale_price * product.quantity,
        0
      );
      console.log(this.form);
      this.stripe
        .confirmCardSetup(this.intent.client_secret, {
          payment_method: {
            card: this.card,
            billing_details: { name: this.form.card_holder_name },
          },
        })
        .then(
          function (result) {
            if (result.error) {
            } else {
              this.form.payment_method = result.setupIntent.payment_method;
              this.$inertia.post(route("checkout.purchase", total), this.form);
            }
          }.bind(this)
        );
    },
  },
  layout: AppLayout,
};
</script>
<style scoped>
.StripeElement {
  box-sizing: border-box;
  height: 40px;
  padding: 10px 12px;
  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;
  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}
.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}
.StripeElement--invalid {
  border-color: #fa755a;
}
.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}
</style>