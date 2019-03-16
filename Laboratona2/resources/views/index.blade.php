@php
    $action = route('addTour');
    //dd($action);
    if(isset($tour) && $tour != null)
    {
        $action = route('edit', $tour->id);
    }
@endphp
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Index</title>
        <meta charset="utf-8">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                        <h1>Перелік співробідників</h1>
                        
                        <form action="{{$action}}" method="POST">
                                {{csrf_field()}}
                            <div class="form-group">
                                <label for="country">Країна</label>
                                <input type="text" name="country" class="form-control" required value="@if (isset($tour) && $tour != NULL){{$tour->country}}@else{{''}}@endif" >
                            </div>
                            <div class="form-group">
                                <label for="city">Місто</label>
                                <input type="text" name="city" class="form-control" required value="@if (isset($tour) && $tour != NULL){{$tour->city}}@else{{''}}@endif">
                            </div>
                            <div class="form-group">
                                <label for="citysMemories">Міські пам'ятки</label>
                                <input type="text" name="citysMemories" class="form-control" required value="@if (isset($tour) && $tour != NULL){{$tour->citysMemories}}@else{{''}}@endif">
                            </div>
                            <div class="form-group">
                                <label for="days">Кількість днів</label>
                                <input type="number" name="days" class="form-control" required value="@if (isset($tour) && $tour != NULL){{$tour->days}}@else{{''}}@endif">
                            </div>
                            <div class="form-group">
                                <label for="date">Дата поїздки</label>
                                <input type="date" name="date" class="form-control" required value="@if (isset($tour) && $tour != NULL){{$tour->date}}@else{{''}}@endif">
                            </div>
                            <div class="form-group">
                                <label for="class">Клас готелю</label>
                                <input type="text" name="class" class="form-control" required value="@if (isset($tour) && $tour != NULL){{$tour->class}}@else{{''}}@endif">
                            </div>
                            <div class="form-group">
                                <label for="price">Ціна</label>
                                <input type="text" name="price" class="form-control" required value="@if (isset($tour) && $tour != NULL){{$tour->price}}@else{{''}}@endif">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Зберегти" class="btn btn-primary mb-2" name="save">
                                <input type="submit" value="Відміна" class="btn btn-primary mb-2" name="cancel">
                            </div>
                        </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                        <table class="table table-hover">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Країна</th>
                                <th scope="col">Місто</th>
                                <th scope="col">Міські пам'ятки</th>
                                <th scope="col">Кількість днів</th>
                                <th scope="col">Дата поїздки</th>
                                <th scope="col">Клас готелю</th>
                                <th scope="col">Ціна</th>
                                <th colspan="2">Редагувати</th>
                            </tr>
                            @foreach ($tours as $item)
                            <tr>
                                <th scope="row">{{$item->id}}</td>
                                <td>{{$item->country}}</td>
                                <td>{{$item->city}}</td>
                                <td>{{$item->citysMemories}}</td>
                                <td>{{$item->days}}</td>
                                <td>{{$item->date}}</td>
                                <td>{{$item->class}}</td>
                                <td>{{$item->price}}</td>
                                <td><i><a href="{{route('edit', $item->id)}}">Редагувати</a></i></td>
                                <td><i><a href="{{route('delete', $item->id)}}">Видалити</a></i></td>
                            </tr>
                            @endforeach
                            
                        </table>
                </div>
            </div>
            
        </div>
    </body>
</html>