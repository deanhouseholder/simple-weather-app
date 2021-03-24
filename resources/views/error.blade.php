@include('snippets.header')

        <div class="container">
            <div class="alert alert-danger" role="alert" style="margin: 40px;">
                I'm sorry, the city you searched could not be found. Only major cities are supported.
            </div>

            <p>Please try searching for a different city.</p>

            <div>
                <form>
                <input class="search_form" type="text" name="search" placeholder="Enter the city name to search for">
                <input type="submit">
                </form>
            </div>


        </div>

@include('snippets.footer')
