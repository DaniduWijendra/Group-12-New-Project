<template>
<v-container
    id="dashboard"
    fluid
    tag="section"
  >

    <v-row>

    
      <!--  ##########################credit card payment form##########################################################################-->
      <v-col cols="12" sm="4">
<base-material-card color="blue" title="Credit Card Payment">

    <div class="wrapper" id="app">
        <div class="card-form">
            <div class="card-list">
                <div class="card-item" v-bind:class="{ '-active' : isCardFlipped }">
                    <div class="card-item__side -front">
                        <div class="card-item__focus" v-bind:class="{'-active' : focusElementStyle }"
                            v-bind:style="focusElementStyle" ref="focusElement"></div>
                        <div class="card-item__cover">
                            <img v-bind:src="'https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/' + currentCardBackground + '.jpeg'"
                                class="card-item__bg">
                        </div>

                        <div class="card-item__wrapper">
                            <div class="card-item__top">
                                <img src="https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/chip.png"
                                    class="card-item__chip">
                                <div class="card-item__type">
                                    <transition name="slide-fade-up">
                                        <img v-bind:src="'https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/' + getCardType + '.png'"
                                            v-if="getCardType" v-bind:key="getCardType" alt=""
                                            class="card-item__typeImg">
                                    </transition>
                                </div>
                            </div>
                            <label for="cardNumber" class="card-item__number" ref="cardNumber">
                                <template v-if="getCardType === 'amex'">
                                    <span v-for="(n, $index) in amexCardMask" :key="$index">
                                        <transition name="slide-fade-up">
                                            <div class="card-item__numberItem"
                                                v-if="$index > 4 && $index < 14 && cardNumber.length > $index && n.trim() !== ''">
                                                *</div>
                                            <div class="card-item__numberItem" :class="{ '-active' : n.trim() === '' }"
                                                :key="$index" v-else-if="cardNumber.length > $index">
                                                {{cardNumber[$index]}}
                                            </div>
                                            <div class="card-item__numberItem" :class="{ '-active' : n.trim() === '' }"
                                                v-else :key="$index + 1">
                                                {{n}}</div>
                                        </transition>
                                    </span>
                                </template>

                                <template v-else>
                                    <span v-for="(n, $index) in otherCardMask" :key="$index">
                                        <transition name="slide-fade-up">
                                            <div class="card-item__numberItem"
                                                v-if="$index > 4 && $index < 15 && cardNumber.length > $index && n.trim() !== ''">
                                                *</div>
                                            <div class="card-item__numberItem" :class="{ '-active' : n.trim() === '' }"
                                                :key="$index" v-else-if="cardNumber.length > $index">
                                                {{cardNumber[$index]}}
                                            </div>
                                            <div class="card-item__numberItem" :class="{ '-active' : n.trim() === '' }"
                                                v-else :key="$index + 1">
                                                {{n}}</div>
                                        </transition>
                                    </span>
                                </template>
                            </label>
                            <div class="card-item__content">
                                <label for="cardName" class="card-item__info" ref="cardName">
                                    <div class="card-item__holder">Card Holder</div>
                                    
                                    <transition name="slide-fade-up">
                                        <div class="card-item__name" v-if="cardName.length" key="1">
                                            <transition-group name="slide-fade-right">
                                                <span class="card-item__nameItem"
                                                    v-for="(n, $index) in cardName.replace(/\s\s+/g, ' ')"
                                                    v-if="$index === $index" v-bind:key="$index + 1">{{n}}</span>
                                            </transition-group>
                                        </div>
                                        <div class="card-item__name" v-else key="2">Full Name</div>
                                    </transition>

                                    
                                </label>
                                
                                <div class="card-item__date" ref="cardDate">
                                    <label for="cardMonth" class="card-item__dateTitle">Expires</label>
                                    <label for="cardMonth" class="card-item__dateItem">
                                        <transition name="slide-fade-up">
                                            <span v-if="cardMonth" v-bind:key="cardMonth">{{cardMonth}}</span>
                                            <span v-else key="2">MM</span>
                                        </transition>
                                    </label>
                                    /
                                    <label for="cardYear" class="card-item__dateItem">
                                        <transition name="slide-fade-up">
                                            <span v-if="cardYear"
                                                v-bind:key="cardYear">{{String(cardYear).slice(2,4)}}</span>
                                            <span v-else key="2">YY</span>
                                        </transition>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-item__side -back">
                        <div class="card-item__cover">
                            <img v-bind:src="'https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/' + currentCardBackground + '.jpeg'"
                                class="card-item__bg">
                        </div>
                        <div class="card-item__band"></div>
                        <div class="card-item__cvv">
                            <div class="card-item__cvvTitle">CVV</div>
                            <div class="card-item__cvvBand">
                                <span v-for="(n, $index) in cardCvv" :key="$index">
                                    *
                                </span>

                            </div>
                            <div class="card-item__type">
                                <img v-bind:src="'https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/' + getCardType + '.png'"
                                    v-if="getCardType" class="card-item__typeImg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-form__inner">
                <div class="card-input">
                    <label for="cardNumber" class="card-input__label">Card Number</label>
                    <input type="text" id="cardNumber" class="card-input__input" v-mask="generateCardNumberMask"
                        v-model="cardNumber" v-on:focus="focusInput" v-on:blur="blurInput" data-ref="cardNumber"
                        autocomplete="off">
                </div>
                <div class="card-input">
                    <label for="cardName" class="card-input__label">Card Holders</label>
                    <input type="text" id="cardName" class="card-input__input" v-model="cardName"
                        v-on:focus="focusInput" v-on:blur="blurInput" data-ref="cardName" autocomplete="off">
                </div>
                <div class="card-input">
                    <label for="cardName" class="card-input__label">Phone number</label>
                    <input type="text"  class="card-input__input" 
                        v-on:focus="focusInput" v-on:blur="blurInput"  autocomplete="off">
                </div>
                <div class="card-input">
                    <label for="cardName" class="card-input__label">Email</label>
                    <input type="email" class="card-input__input"
                        v-on:focus="focusInput" v-on:blur="blurInput"  autocomplete="off">
                </div>
                <div class="card-form__row">
                    <div class="card-form__col">
                        <div class="card-form__group">
                            <label for="cardMonth" class="card-input__label">Expiration Date</label>
                            <select class="card-input__input -select" id="cardMonth" v-model="cardMonth"
                                v-on:focus="focusInput" v-on:blur="blurInput" data-ref="cardDate">
                                <option value="" disabled selected>Month</option>
                                <option v-bind:value="n < 10 ? '0' + n : n" v-for="n in 12"
                                    v-bind:disabled="n < minCardMonth" v-bind:key="n">
                                    {{n < 10 ? '0' + n : n}}
                                </option>
                            </select>
                            <select class="card-input__input -select" id="cardYear" v-model="cardYear"
                                v-on:focus="focusInput" v-on:blur="blurInput" data-ref="cardDate">
                                <option value="" disabled selected>Year</option>
                                <option v-bind:value="$index + minCardYear" v-for="(n, $index) in 12" v-bind:key="n">
                                    {{$index + minCardYear}}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="card-form__col -cvv">
                        <div class="card-input">
                            <label for="cardCvv" class="card-input__label">CVV</label>
                            <input type="text" class="card-input__input" id="cardCvv" v-mask="'####'" maxlength="4"
                                v-model="cardCvv" v-on:focus="flipCard(true)" v-on:blur="flipCard(false)"
                                autocomplete="off">
                        </div>
                    </div>
                </div>

                <button class="card-form__button" @click="add">
                    Add
                </button>

                <button class="card-form__button" @click="pays">
                    Pay Now
                </button>
            </div>
        </div>
    </div>

    </div>
          
          </base-material-card>

                 
            
            
      </v-col>  

      <v-col cols="12" sm="4">

          
    <base-material-card color="blue" title="PayPal Payment">

    <v-form
    ref="form"
    v-model="valid"
    lazy-validation
    class="mx-3"
  >
  
    <p>login to paypal here</p>
    <v-text-field
        filled
      v-model="email"
      :rules="emailRules"
      label="E-mail"
      required
    ></v-text-field>
  <v-text-field
    filled
      v-model="password"
      :counter="10"
      :rules="nameRules"
      label="Password"
      required
      type="password"
    ></v-text-field>
  

    <v-checkbox
      v-model="checkbox"
      :rules="[v => !!v || 'You must agree to continue!']"
      label="Do you agree?"
      required
    ></v-checkbox>

    <v-col cols="12" sm="12">
        <v-btn
      :disabled="!valid"
      color="blue"
      @click="paypal">

      Login to Paypal
    </v-btn>

    <v-card height="678px">

        <v-img src="../../../assets/img/policyholder/payment.png" class="mb-5"></v-img>
         <v-img src="../../../assets/img/policyholder/PayPal-logo.png"></v-img>
    </v-card>
      
    

    </v-col>
    
      

 
  </v-form>
          
          </base-material-card>

      </v-col>

      <v-col cols="12" sm="4">

          <base-material-card color="blue" title="QR pay">

            <v-card height="1035px">
                <v-img src="../../../assets/img/policyholder/QR_Code-512.png" class="mb-5"></v-img>
                 <v-img src="../../../assets/img/policyholder/scanQR.jpg"></v-img>
            </v-card>
          
          </base-material-card>


      </v-col>
    </v-row>

      <!-- ################################################################################################################################### -->
</v-container>
</template>

<style >
  
@import './payment1.css';   
@keyframes handmovebase{0%{transform:rotate(90deg) scale(0) translateY(-450px);animation-timing-function:ease-out}
      18%,21%{transform:rotate(-20deg) scale(1) translateY(-100px)}
      30%{transform:rotate(1deg) translateY(-90px);animation-timing-function:cubic-bezier(.26,.95,.3,1)}
      60%{transform:rotate(0deg) translateY(40px)}75%{transform:rotate(0deg);

animation-timing-function:cubic-bezier(.95,-.1,1,.63)}89%,to{transform:rotate(-180deg) scale(0) translateX(-300px)}}
@keyframes handy{0%,80%{transform:rotate(0deg)}20%{transform:rotate(0deg) translateY(0)}45%{transform:rotate(3deg) translateY(1px)}55%{transform:rotate(3deg) translateY(2px)}}
@keyframes cardy{0%{transform:rotate(0deg);animation-timing-function:ease-out}12%,30%{transform:rotate(0deg)}22%{transform:rotate(-2.5deg)}25%{transform:rotate(-3deg)}}
@keyframes cardshad{0%,12%,89%,to{transform:translateY(90px)}30%{transform:translateY(90px);animation-timing-function:cubic-bezier(.26,.95,.3,1)}60%{transform:translateY(-40px)}75%{transform:translateY(0)}}
@keyframes thumby{0%,to{transform:rotate(0deg)}18%,21%{transform:rotate(-9deg)}30%{transform:rotate(1deg)}55%{transform:translateY(5px)}75%{transform:rotate(0deg);animation-timing-function:cubic-bezier(.95,-.1,1,.63)}89%{transform:rotate(-15deg)}}
@keyframes speedy{0%,12%,75%,89%,to{transform:scaleY(0)}30%{transform:scaleY(0);animation-timing-function:cubic-bezier(.26,.95,.3,1);opacity:1}60%{transform:scaleY(1)}69%{transform:scaleY(0);opacity:0}}
@keyframes readercast{0%,12%,30%,82.8%,to{transform:scaleY(0)}33%,82%{transform:scaleY(.3)}38%,80%{transform:scaleY(.7)}47%{transform:scaleY(1.2)}75%{transform:scaleY(1.1)}}



 
</style>


<script>
export default {
      
       data() {
        return {
            currentCardBackground: Math.floor(Math.random() * 25 + 1), // just for fun :D
            cardName: "",
            cardNumber: "",
            cardMonth: "",
            cardYear: "",
            cardCvv: "",
            minCardYear: new Date().getFullYear(),
            amexCardMask: "#### ###### #####",
            otherCardMask: "#### #### #### ####",
            cardNumberTemp: "",
            isCardFlipped: false,
            focusElementStyle: null,
            isInputFocused: false,


             valid: true,
      
      password:'',
      nameRules: [
        v => !!v || 'Name is required',
        v => (v && v.length <= 10) || 'Name must be less than 10 characters',
      ],
      email: '',
      emailRules: [
        v => !!v || 'E-mail is required',
        v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
      ],
    
    
      checkbox: false,
        }
       },

        mounted() {
        this.cardNumberTemp = this.otherCardMask;
        document.getElementById("cardNumber").focus();
    },
    computed: {
        getCardType() {
            let number = this.cardNumber;
            let re = new RegExp("^4");
            if (number.match(re) != null) return "visa";

            re = new RegExp("^(34|37)");
            if (number.match(re) != null) return "amex";

            re = new RegExp("^5[1-5]");
            if (number.match(re) != null) return "mastercard";

            re = new RegExp("^6011");
            if (number.match(re) != null) return "discover";

            re = new RegExp("^9792");
            if (number.match(re) != null) return "troy";

            return "visa"; // default type
        },
        generateCardNumberMask() {
            return this.getCardType === "amex" ?
                this.amexCardMask :
                this.otherCardMask;
        },
        minCardMonth() {
            if (this.cardYear === this.minCardYear)
                return new Date().getMonth() + 1;
            return 1;
        }
    },
    watch: {
        cardYear() {
            if (this.cardMonth < this.minCardMonth) {
                this.cardMonth = "";
            }
        }
    },
    methods: {
        flipCard(status) {
            this.isCardFlipped = status;
        },
        focusInput(e) {
            this.isInputFocused = true;
            let targetRef = e.target.dataset.ref;
            let target = this.$refs[targetRef];
            this.focusElementStyle = {
                width: `${target.offsetWidth}px`,
                height: `${target.offsetHeight}px`,
                transform: `translateX(${target.offsetLeft}px) translateY(${target.offsetTop}px)`
            };
        },
        blurInput() {
            let vm = this;
            setTimeout(() => {
                if (!vm.isInputFocused) {
                    vm.focusElementStyle = null;
                }
            }, 300);
            vm.isInputFocused = false;
        },

        add(){this.s("card is successfully added");},

        pays(){
            this.s("payment is successfully");
        },

        paypal(){
            this.s("login successfully");
        }
    }
}

</script>