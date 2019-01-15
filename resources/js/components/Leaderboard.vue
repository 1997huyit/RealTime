<template>
    <table id="order-listing" class="table">
                        <thead>
                            <tr>
                                <th>ID Đơn hàng</th>
                                <th>Tên đơn hàng</th>
                                <th>Trạng thái</th>
                                <th>Chọn tài xế</th>
                                <th>Chọn phụ xe</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr :class="{success: order.id == current}" v-for="order in orders">
                                <td>{{order.id}}</td>
                                <td>{{order.name}}</td>
                                <td>Mới tạo</td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="" v-on:click.prevent="editOrder(order)"><button style="padding: 0"
                                       class="btn btn-outline-secondary btn-rounded btn-icon btn-edit">
                                       <i class="fas fa-pencil-alt"></i>
                                   </button></a>
                                    <a href="" v-on:click.prevent="deleteOrder(order)"><button style="padding: 0" class="btn btn-outline-secondary btn-rounded btn-icon btn-delete">
                                    <i class="far fa-trash-alt"></i>
                                  </button></a>
                                </td>
                        </tr>
                    </tbody>
                </table>
</template>

<script>
    export default {
        props: ['current'],
        data() {
            return {
                orders: []
            }
        },
        created() {
            this.fetchLeaderboard();
            this.listenForChanges();
        },
        methods: {
            fetchLeaderboard() {
                axios.get('/leaderboard').then((response) => {
                    this.orders = response.data;
                })
            },
            listenForChanges() {
                Echo.channel('leaderboard')
                .listen('OrderLoaded', (e) => {
                    var order = this.orders.find((order) => order.id === e.id);
                        // check if user exists on leaderboard
                      
                            this.orders.push(e)
                    })
            },
            deleteOrder: function(order){
                var url = 'order/delete/'+order.id;
                 axios.get(url).then((response) => {
                    this.fetchLeaderboard();
                });
            },
            editOrder: function(order){
                var url = 'order/edit/'+order.id;
                 axios.get(url).then((response) => {
                    window.location = "http://localhost:8000/coordinator/"+url;
                });
            }

        },
        // computed: {
        //     sortedUsers() {
        //         return this.orders
        //     }
        // }
    }
</script>