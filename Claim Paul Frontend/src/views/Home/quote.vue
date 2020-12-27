<template>
    <v-container>

        <v-row>
            <v-col cols="12" sm="6">
                <v-card class="mx-12">
                    <h3 class="quote-head pa-3">
                        Vehicles insurance Quote
                    </h3>
                    <v-form class="ma-3">
                        <v-text-field filled clearable class="mx-12" label="Full Name" prepend-icon="mdi-account"></v-text-field>
                        <v-text-field filled clearable class="mx-12" label="Mail Address" prepend-icon="mdi-mail"></v-text-field>
                        <v-text-field filled clearable class="mx-12" label="Phone Number" prepend-icon="mdi-phone"></v-text-field>
                        <v-btn  class="blue offset-8 mb-3">Get Quote Now</v-btn>
                    </v-form>
                </v-card>
                
            </v-col>
            <v-col cols="12" sm="4" class="quote offset-1">
                <p style="color:lightblue;">//Get Quote</p>
                <h3 class="quote-head">Compare quotes and <br> get life insurance in <br> right way</h3>
                <br>
                <span>Reliable. Personable. Fast.</span>
                <br><br>

                <p >Start a fast, free auto insurance quote with Alico. We help you <br> find any insurance coverages that are right for you, so you’re <br> not paying for anything you don’t want!</p>
                <br><br>
                <p>Get a insurance quote – typically in 2 minutes or less. Switch to <br> Alico for an insurance policy from a brand you can trust.</p>

                <br><br><br>

                <span>Facing any problem to get a quote!</span><br>
                <div class="d-flex my-3"><v-icon>mdi-phone-in-talk</v-icon><p class="offset-1">Call: 0774444444</p></div>
                
            </v-col>
        </v-row>

    </v-container>
</template>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Staatliches&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Archivo+Narrow&family=Lobster&family=Staatliches&display=swap');
.quote-head{

    font-family: 'Staatliches', cursive;

}

.quote span{

    color:rgb(8, 129, 241);
    font-size: 1.5rem;
}


</style>