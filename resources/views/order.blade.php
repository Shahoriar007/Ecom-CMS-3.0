@extends('masterAdmin')
@section('adminOrder')

<!-- content @s -->
<div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="components-preview wide-md mx-auto">
                                    

                                    <div class="nk-block nk-block-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <h4 class="title nk-block-title">order Section</h4>
                                                <div class="nk-block-des">
                                                    <p>You can make style out your setting related form as per below example.</p>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="components-preview wide-md mx-auto">
                                    

                                    <div class="nk-block nk-block-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <h4 class="title nk-block-title">Slider Input Section</h4>
                                                <div class="nk-block-des">
                                                    <p>You can make style out your setting related form as per below example.</p>
                                                </div>
                                            </div>
                                        </div>
                    <!-- Cart Table Area -->
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="pro-thumbnail">Order id</th>
                                    <th class="pro-title">Total amount</th>
                                    <th class="pro-remove">Status</th>
                                    <th class="pro-remove">Details</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td class="pro-size">{{$order->id}}</td>
                                    <td class="pro-price tk-part">{{$order->amount}}</td>
                                    <td class="pro-subtotal tk-part">{{$order->status}}</td>
                                    <td class="pro-remove"><button type="button"><a href="{{'/admin/orderDetail/'.$order->id}}">view detail</a></button></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>

        </div>
</div>
</div>
