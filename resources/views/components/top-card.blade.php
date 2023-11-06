<div class="mains-card">
    <ul class="cards">
        <li class="cards_item">
            <div class="card shadow-sm">
                <div class="card_image">
                    <span class="note">Top Loyal Customers</span>
                    <img src="https://images.unsplash.com/photo-1568084680786-a84f91d1153c?auto=format&fit=crop&q=80&w=1974&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="image-card-top-cust" />
                    <span class="card_price"><span></span>1st</span>
                </div>
                <div class="card_content">
                    <h2 class="card_title">PT. DEVELOPER HOTEL INDONESIA</h2>
                    <div class="card_text">
                        <p><span class="me-2"><i class="bi bi-geo-alt-fill"></i></span> Jl. Lampung selatan,
                            Tanggamus,
                            Indonesia
                        </p>
                        <p><span class="me-2"><i class="bi bi-buildings-fill"></i></span> Apartement & Hotel
                            (Property)
                        </p>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</div>

<style>
    .mains-card {
        max-width: 1300px;
        margin: 0 auto;
    }

    .cards {
        display: flex;
        flex-wrap: wrap;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .cards_item {
        display: flex;
    }

    .card_image {
        position: relative;
        max-height: 250px;
    }

    .card_image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .card_price {
        position: absolute;
        bottom: 8px;
        right: 8px;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 45px;
        height: 45px;
        border-radius: 5rem;
        background-color: #c70039;
        color: white;
        font-size: 18px;
        font-weight: 700;
    }

    .card_price span {
        font-size: 12px;
        margin-top: -2px;
    }

    .note {
        position: absolute;
        top: 8px;
        left: 8px;
        padding: 4px 8px;
        border-radius: 0.35rem;
        background-color: #c70039;
        color: white;
        font-size: 14px;
        font-weight: 700;
    }
</style>
