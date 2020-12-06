
export default {

    methods:{

        i(desc,title="Hey") {
            this.$Notice.info({
                title:title,
                desc:desc
            });
        },
        s(desc,title="Success") {
            this.$Notice.success({
                title:title,
                desc:desc
            });
        },
        w(desc,title="Great") {
            this.$Notice.warning({
                title:title,
                desc:desc
            });
        },
        e(desc,title="Oops") {
            this.$Notice.error({
                 title:title,
                desc:desc
            });
        },
        swr(desc="somthing went Wrong! please try again",title="Oops") {
            this.$Notice.error({
                 title:title,
                desc:desc
            });
        }



    }
   

}