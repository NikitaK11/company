@extends('layouts.app')
@section('content')
    <div class="container event-view">
        <h3>Оформление заказа</h3>
        <div class="row">

            <div class="col-md-5">
                <img style="width: 100%;" src="{{asset( 'images/events/' . $event->img)}}" alt="">
            </div>

            <form id="formBlock" action="/confirmed" method="get" class="col-md-6">

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Дата</div>
                            </div>
                            <input readonly type="text" class="form-control" value="{{$event->date_begin_event}}">
                        </div>
                    </div>
                </div>

                <div class="event-option">
                    <div class="col-sm-10 my-1">

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Осталось до мироприятия</div>
                            </div>
                            <input readonly type="text" class="form-control" value="  {{$event->timeToEvent()}} <?php
                            if($event->timeToEvent() == 1)
                                echo 'день';
                            else if ($event->timeToEvent() < 5 && $event->timeToEvent() != 0){
                                echo 'дня';
                            }
                            else{
                                echo 'дней';
                            }
                            ?>">

                        </div>
                    </div>
                </div>

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Осталось билетов</div>
                            </div>
                            <input readonly type="text" class="form-control" value="{{$event->countAvailableTickets()}} / {{$event->place->capacity}}">
                        </div>
                    </div>
                </div>

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Место</div>
                            </div>
                            <input readonly type="text" class="form-control" value="{{$event->place->name}}">
                        </div>
                    </div>
                </div>

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Адрес</div>
                            </div>
                            <input readonly type="text" class="form-control" value="{{$event->place->address}}">
                        </div>
                    </div>
                </div>

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Описание</div>
                            </div>
                            <textarea readonly class="form-control" >{{$event->description}}</textarea>
                        </div>
                    </div>
                </div>

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Стоимость</div>
                            </div>
                            <input readonly type="text" class="form-control" value="{{$event->price}} BYN">
                        </div>
                    </div>
                </div>


                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Количесвто</div>
                            </div>
                            <input id="inputQuantity" data-pirce="{{$event->price}}" data-count_max="{{$event->countAvailableTickets()}}" name="quantity" max="{{$event->countAvailableTickets()}}" min="1" type="number" class="form-control" value="1">
                        </div>
                    </div>
                </div>

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Итого</div>
                            </div>
                            <input readonly id="inputTotal" type="text" class="form-control" value="{{$event->price}} BYN">
                        </div>
                    </div>
                </div>

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Тип оплаты</div>
                            </div>
                            <select id="selectPaymentType" name="paymentType" class="form-control">
                                @foreach($payTypes as $payType)
                                    <option value="{{$payType->id}}">{{$payType->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <input name="event" value="{{$event->id}}" hidden>

                <input name="number" id="inputPaymentNumber" hidden>

                <div class="event-option col-md-5">
                    <div  class="btn btn-success my-2 my-sm-0"  data-toggle="modal" data-target="#exampleModal">Оформить</div>
                </div>
            </form>


        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Сиситема оплаты</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="event-option">
                            <div class="col-sm-10 my-1">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <span>Введите номер: </span><spa id="typePaymentTitle">ЕРИП</spa>
                                        </div>
                                    </div>
                                    <input id="paymentNumber" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" id="btnSubmitFrom" class="btn btn-success" value="Подтвердить" data-dismiss="modal"/>
                        <button data-dismiss="modal" type="button" class="btn btn-primary">Отмена</button>
                    </div>
                </div>
            </div>
        </div>

        <script>

            let paymentTypes = ['ЕРИП','VISA','Яндекс деньги'];

            $(document).ready(function () {
                let countAvailable = parseInt( document.getElementById('inputQuantity').dataset.count_max);
                let price = parseInt( document.getElementById('inputQuantity').dataset.pirce);
                $('#inputQuantity').on('input',function () {
                    if(this.value > countAvailable){
                        this.value = 1;
                    }
                    $('#inputTotal').val((parseInt(this.value) * price)+' BYN');
                });

                $('#selectPaymentType').on('change',function () {
                    $('#typePaymentTitle').html(paymentTypes[this.value-1]);
                });

                $('#btnSubmitFrom').on('click',function () {

                    let number = $('#paymentNumber').val();

                    $('#inputPaymentNumber').val(number);

                    $('#formBlock').submit();
                });

                $('#modalBtnClose').click(function () {
                    $('#myModal').modal('hide');
                });
            });

        </script>

@endsection