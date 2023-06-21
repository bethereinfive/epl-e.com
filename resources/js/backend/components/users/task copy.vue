<template>
    <div>

        <section id="orderpage">
            <div class="container-fluid">
                <h2></h2>
            </div>
        </section>


        <section id="topbar">
            <div class="title">
                <p>Orders</p>
                <a href="orders.html"><img :src="$asseturl+'frontend/img/tasks.png'" alt="logo"></a>
            </div>
        </section>
        <section id="banner">
            <h3>ORDERS</h3>
            <p>Automatic order mode</p>
        </section>

        <section id="taskdetails">
            <div class="container-fluid">
                <h4>Today's results</h4>
                <div class="shadow">
                    <div class="row">
                        <div class="col-6">
                            <div class="data c">
                                <p>Total assets（TK）</p>
                                <div class="tk"> TK 200 </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="data">
                                <p>Today's orders</p>
                                <div class="tk"> 0 Orders </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="data">
                                <p>Today earnings</p>
                                <div class="tk"> TK 0.00</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="data">
                                <p>Yesterday earnings</p>
                                <div class="tk"> TK 0.00</div>
                            </div>
                        </div>


                    </div>

                </div>

            </div>
        </section>
        <section id="box">
            <div class="container-fluid">
                <div class="box-text">
                    <span class="b">Unlock</span><span class="content-text">Higher commission for exclusive channel of
                        next level</span>
                </div>
            </div>
        </section>
        <section id="description">
            <div class="container-fluid">
                <div class="dec-box">
                    <span class="gradient">Description of</span>
                    <p>According to the membership level, each account can grab the number of orders per day:10</p>
                </div>
            </div>
        </section>

    </div>
</template>
