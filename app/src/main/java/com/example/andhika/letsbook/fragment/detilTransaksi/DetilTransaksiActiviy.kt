package com.example.andhika.letsbook.fragment.detilTransaksi

import android.os.Bundle
import com.example.andhika.letsbook.R
import com.example.andhika.letsbook.base.BaseActivity
import kotlinx.android.synthetic.main.activity_detil_transaksi.*

class DetilTransaksiActiviy : BaseActivity() {


    override fun onSetupLayout() {
        setContentView(R.layout.activity_detil_transaksi)
    }

    override fun onViewReady() {
        val bundle = intent.extras

        tv_content_lokasi.text = bundle.getString("LOKASI")
        tv_content_biaya.text = bundle.getString("HARGA_TIKET")
    }
}