<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TLE Purchase Management</title>
  <link rel="stylesheet" href="{{asset('public/css/font-awesome.min.css')}}">
  <link rel="stylesheet" id="bulma" href="{{asset('public/css/bulma.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('public/css/login.css')}}">
</head>
<body>
  <div class="login-wrapper columns">
    <div class="column is-8 is-hidden-mobile hero-banner">
      <section class="hero is-fullheight is-dark">
        <div class="hero-body">
          <div class="container section">
            <div class="has-text-right">
              <h1 class="title is-1">Login</h1> <br>
              <p class="title is-3">TLE Purchase Management</p>
            </div>
          </div>
        </div>
        <div class="hero-footer">
          <p class="has-text-centered">TLE Purchase Management © 2017</p>
        </div>
      </section>  
    </div>
    <div class="column is-4">
      <section class="hero is-fullheight">
        <div class="hero-heading">
          <div class="section has-text-centered">
          </div>
        </div>
        <div class="hero-body">
          <div class="container">
            <div class="columns">
              <div class="column is-8 is-offset-2">
                <h1 class="avatar has-text-centered section">
                  <img src="https://placehold.it/128x128">
                </h1>
                <form action="/login" method="POST">
                    <div class="login-form">
                      <p class="control has-icon has-icon-right">
                        <input class="input email-input" type="text" placeholder="Email">
                      </p>
                      <p class="control has-icon has-icon-right">
                        <input class="input password-input" type="password" placeholder="Password">
                      </p>
                      <p class="control login">
                        <button class="button is-success is-outlined is-large is-fullwidth">Login</button>
                      </p>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>  
    </div>
  </div>

</body>
</html>
