<style>
  /* ===== FOOTER UI IMPROVEMENT (NO HTML CHANGE) ===== */

.ftco-footer {
    background: linear-gradient(135deg, #0f172a, #1e293b);
    padding: 60px 0;
    color: #e5e7eb;
}

.ftco-footer-widget {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 16px;
    padding: 30px;
    box-shadow: 0 12px 35px rgba(0, 0, 0, 0.4);
    text-align: center;
}

/* Heading */
.ftco-heading-2 {
    font-size: 22px;
    font-weight: 700;
    margin-bottom: 25px;
    color: #ffffff;
    position: relative;
}

.ftco-heading-2::after {
    content: "";
    display: block;
    width: 60px;
    height: 3px;
    background: #38bdf8;
    margin: 10px auto 0;
    border-radius: 2px;
}

/* Contact list */
.block-23 ul {
    padding: 0;
    margin: 0;
}

.block-23 li {
    list-style: none;
    font-size: 16px;
    display: flex;
    align-items: center;
    gap: 12px;
    color: #e5e7eb;
}

/* Align phone & email properly */
.form-group.d-flex {
    justify-content: center;
    gap: 25px;
    flex-wrap: wrap;
}

/* Icons */
.block-23 .icon {
    font-size: 18px;
    color: #38bdf8;
}

/* Hover effect */
.block-23 li:hover {
    color: #38bdf8;
    transform: translateY(-1px);
    transition: 0.3s ease;
}

/* ===== Loader Color Match ===== */
#ftco-loader .path {
    stroke: #38bdf8;
}

  </style>

<footer class="ftco-footer ftco-section">
    <div class="container">
        {{-- <div class="row">
            <div class="mouse">
                <a href="#" class="mouse-icon">
                    <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
                </a>
            </div>
        </div> --}}
      <div class="row mb-5">
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Have a Questions?</h2>
              <div class="block-23">
                <ul>
                <div class="form-group d-flex">
                  <li><span class="icon icon-phone"></span><span>+91 98989 89998</span></li>
                  <li>&nbsp;&nbsp;&nbsp;&nbsp;</li>
                  <li><span class="icon icon-envelope"></span><span> cackshop@gmail.com</span></li>
                </div>
                </ul>
              </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>