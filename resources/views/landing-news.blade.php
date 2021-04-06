<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/news.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fugaz+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Yeseva+One&display=swap" rel="stylesheet">
</head>

<body>
    <div id="newspaper">

        <h1 id="h11">INOVOLA <a id="newsh1">NEWS</a></h1>
        <h6 id="zeros">~00.00.0000~</h6>
        <hr id="hr1"><br><br>

        <form action="{{ route('news') }}">
            <label for="order">Order by:</label>
            <select name="sort">
                <option value="datetime">Time Asc</option>
                <option value="rating">Rating Asc</option>
            </select>
            <br><br>
            <input type="submit" value="Submit">
        </form>

        @foreach ($news as $item)

            <img id="trump"
                src="https://media1.s-nbcnews.com/j/newscms/2017_50/1647031/160801-the-simpsons-3am-call-rd-140a_70cf771e2ee7b6e87614e836261dd419.fit-760w.jpg">
            <p id="random1">
                Title: {{ $item->title }}<br>
                Content: {{ $item->Content }}<br>
                Rating: {{ $item->rating }}.<br>
                Time: {{ $item->datetime }}.<br>
                Source: {{ $item->source }}.</p>
        @endforeach

    </div>
</body>

</html>
