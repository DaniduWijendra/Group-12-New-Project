<template>
  <v-card
    class="mx-3"
    max-width="800"
  >
    <v-card
      dark
    
    >
      <v-btn
        absolute
        bottom
        color="pink"
        right
        fab
      >
        <v-icon>mdi-plus</v-icon>
      </v-btn>
      <v-card-title class=" purple lighten-3">
        
        <h3 class="title font-weight-light text-center grow">
          News
        </h3>
        <v-avatar>
          <v-img src="https://avataaars.io/?avatarStyle=Circle&topType=LongHairStraight&accessoriesType=Blank&hairColor=BrownDark&facialHairType=Blank&clotheType=BlazerShirt&eyeType=Default&eyebrowType=Default&mouthType=Default&skinColor=Light"></v-img>
        </v-avatar>
      </v-card-title>
      <v-img
        src="../../../assets/img/home/Group2.png"
        gradient="to top, rgba(0,0,0,.44), rgba(0,0,0,.44)"
      >
       
      </v-img>
    </v-card>
    <v-card-text class="py-0">
      <v-timeline
        align-top
        dense
      >
        <v-timeline-item
          color="pink"
          small
        >
          <v-row class="pt-1">
            <v-col cols="3">
              <strong>5pm</strong>
            </v-col>
            <v-col>
              <strong>New Icon</strong>
              <div class="caption">
                Mobile App Update
              </div>
            </v-col>
          </v-row>
        </v-timeline-item>

        <v-timeline-item
          color="teal lighten-3"
          small
        >
          <v-row class="pt-1">
            <v-col cols="3">
              <strong>3.42pm</strong>
            </v-col>
            <v-col>
              <strong>Design Stand Up</strong>
              <div class="caption mb-2">
                Hangouts
              </div>
              <v-avatar>
                <v-img
                  src="https://avataaars.io/?avatarStyle=Circle&topType=LongHairFrida&accessoriesType=Kurt&hairColor=Red&facialHairType=BeardLight&facialHairColor=BrownDark&clotheType=GraphicShirt&clotheColor=Gray01&graphicType=Skull&eyeType=Wink&eyebrowType=RaisedExcitedNatural&mouthType=Disbelief&skinColor=Brown"
                ></v-img>
              </v-avatar>
              <v-avatar>
                <v-img
                  src="https://avataaars.io/?avatarStyle=Circle&topType=ShortHairFrizzle&accessoriesType=Prescription02&hairColor=Black&facialHairType=MoustacheMagnum&facialHairColor=BrownDark&clotheType=BlazerSweater&clotheColor=Black&eyeType=Default&eyebrowType=FlatNatural&mouthType=Default&skinColor=Tanned"
                ></v-img>
              </v-avatar>
              <v-avatar>
                <v-img
                  src="https://avataaars.io/?avatarStyle=Circle&topType=LongHairMiaWallace&accessoriesType=Sunglasses&hairColor=BlondeGolden&facialHairType=Blank&clotheType=BlazerSweater&eyeType=Surprised&eyebrowType=RaisedExcited&mouthType=Smile&skinColor=Pale"
                ></v-img>
              </v-avatar>
            </v-col>
          </v-row>
        </v-timeline-item>

        <v-timeline-item
          color="pink"
          small
        >
          <v-row class="pt-1">
            <v-col cols="3">
              <strong>12pm</strong>
            </v-col>
            <v-col>
              <strong>Pandemic time activities</strong>
            </v-col>
          </v-row>
        </v-timeline-item>

        <v-timeline-item
          color="teal lighten-3"
          small
        >
          <v-row class="pt-1">
            <v-col cols="3">
              <strong>9-11am</strong>
            </v-col>
            <v-col>
              <strong>Your idea add</strong>
              <div class="caption">
                great
              </div>
            </v-col>
          </v-row>
        </v-timeline-item>
      </v-timeline>
    </v-card-text>
  </v-card>
</template>