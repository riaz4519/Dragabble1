<template>
    <!-- after props un commmenting this and then remove the $ sign and arrow with . run -->
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Quote</th>
                <th>Visible</th>
                <th>Order</th>
                <th>Sort</th>
            </tr>
        </thead>


        <!-- {{ tbody is replaced with draggable element / after testimonials new we do the animations /then work with handle wich is use to specify a  a selector my-handle / then making a th header call sort adding a arrow font awesome which can be install with npm the link is in trello /that select class is my handle and we can drag and drop this by that arrow / adding css .myhandle{ cursor:move } to the app.scss which is in sass folder under resource asset / then we create change event on draggable which call when the table is change and call a update method .it goes throw every order item in the testimonial.order and re-oreder by giving new value /then its time to update those order value to the data base for that using axio.put to send those data to the controller where it will be updated-->

        <draggable :list="testimonialsNew" :options="{animation:200,handle:'.my-handle'}" :element="'tbody'" @change="update">
         <tr v-for="(testimonial,index) in testimonialsNew">
            <td>
                {{ testimonial.id }}
<!--                     <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn btn-primary btn-xs mb">Edit</a>
                    <form action="{{ route('admin.testimonials.delete', $testimonial) }}" method="POST">
                        {{ csrf_field() }}
                        {!! method_field('delete') !!}

                        <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                    </form> -->

                </td>
                <td>{{ testimonial.name }}</td>
                <td>{{ testimonial.quote }}</td>
                <td>{{ testimonial.visible }}</td>
                <td>{{ testimonial.order }}</td>
                <td><i class="fa fa-arrows my-handle"></i></td>
            </tr>

        </draggable>

    </table>
</template>

<script>
import draggable from 'vuedraggable'
export default {

    components: {
        draggable
    },
    data(){
        return {
            testimonialsNew:this.testimonials,

        }
    },
    methods: {
        update:function(){
            this.testimonialsNew.map((testimonial,index) =>{

                testimonial.order = index + 1;
            });
            axios.put('/testimonials/updateAll',{
                testimonials: this.testimonialsNew
            }).then((response)=>{

            })
        }

    },
    props: ['testimonials'],

    mounted() {
        console.log('Component mounted.')
    }
}
</script>
