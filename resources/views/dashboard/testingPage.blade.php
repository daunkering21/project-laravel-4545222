<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Page 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/baru.css">
</head>
<body>

  <div class="calculator">
    <input type="text" id="display" readonly>
    <div class="buttons">
      <button onclick="clearDisplay()">C</button>
      <button onclick="appendValue(7)">7</button>
      <button onclick="appendValue(8)">8</button>
      <button onclick="appendValue(9)">9</button>
      <button onclick="appendOperator('/')">/</button>
      <button onclick="appendValue(4)">4</button>
      <button onclick="appendValue(5)">5</button>
      <button onclick="appendValue(6)">6</button>
      <button onclick="appendOperator('*')">*</button>
      <button onclick="appendValue(1)">1</button>
      <button onclick="appendValue(2)">2</button>
      <button onclick="appendValue(3)">3</button>
      <button onclick="appendOperator('-')">-</button>
      <button onclick="appendValue(0)">0</button>
      <button onclick="appendValue('.')">.</button>
      <button onclick="calculate()">=</button>
      <button onclick="appendOperator('+')">+</button>
    </div>
  </div>
  {{-- <div class="colorful-page-wrapper">
    <div class="center-block">
      <div class="login-block">
        <form action="#" class="orb-form" id="login-form" name="frm_login" method="post" accept-charset="utf-8" novalidate="novalidate">
          <header>
            <div class="image-block">LOTTO GENTING</div>
            Login
          </header>
          <fieldset>
            <section>
              <div class="row">
                <label class="label col col-4" for="txtUsername">Username</label>
                <div class="col col-8">
                  <label class="input"> <i class="icon-append fa fa-user"></i>
                  <input type="text" name="txtUsername" id="txtUsername">
                </label>
                </div>
              </div>
            </section>
            <section>
              <div class="row">
                <label class="label col col-4" for="txtPassword">Password</label>
                <div class="col col-8">
                  <label class="input"> <i class="icon-append fa fa-lock"></i>
                  <input type="password" name="txtPassword" id="txtPassword">
                </label>
                </div>
              </div>
            </section>
          </fieldset>
          <footer>
            <button type="submit" class="btn btn-default">Log in</button>
          </footer>
          </form>
      </div>
    </div>
  </div> --}}

    {{-- <nav class="navbar bg-body-tertiary fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Offcanvas navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                  </ul>
                </li>
              </ul>
              <form class="d-flex mt-3" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
            </div>
          </div>
        </div>
    </nav> --}}
    <script>
      let display = document.getElementById('display');
let expression = '';

function appendValue(value) {
  expression += value;
  display.value = expression;
}

function appendOperator(operator) {
  if (expression.length === 0) return;
  const lastChar = expression[expression.length - 1];
  if (lastChar === '+' || lastChar === '-' || lastChar === '*' || lastChar === '/') {
    expression = expression.slice(0, expression.length - 1);
  }
  expression += operator;
  display.value = expression;
}

function calculate() {
  try {
    const result = eval(expression);
    display.value = result;
    expression = result.toString();
  } catch (error) {
    display.value = 'Error';
  }
}

function clearDisplay() {
  expression = '';
  display.value = '';
}
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>