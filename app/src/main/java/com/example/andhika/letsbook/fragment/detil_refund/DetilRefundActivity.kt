package com.example.andhika.letsbook.fragment.detil_refund

import android.content.Intent
import android.support.v4.content.ContextCompat
import android.support.v7.widget.Toolbar
import android.util.Log
import android.view.View
import com.bumptech.glide.Glide
import com.example.andhika.letsbook.R
import com.example.andhika.letsbook.base.BaseActivity
import com.example.andhika.letsbook.deps.SharedPreferenceHelper
import com.example.andhika.letsbook.main.Main2Activity
import com.example.andhika.letsbook.model.RefundRequest
import com.example.andhika.letsbook.model.RefundResponse
import com.example.andhika.letsbook.utils.Costant.Common.Companion.ID_PELANGGAN
import kotlinx.android.synthetic.main.activity_transaksi.*
import java.text.NumberFormat
import java.util.*
import javax.inject.Inject

class DetilRefundActivity : BaseActivity(),DetilRefundContract.View{


    @Inject
    lateinit var presenter: DetilRefundPresenter

    @Inject
    lateinit var sharedPreferenceHelper: SharedPreferenceHelper

    override fun onSetupLayout() {
        setContentView(R.layout.activity_transaksi)
        setupToolbarTitle(toolbar_layout as Toolbar , R.string.detil_refund,R.drawable.ic_arrow_back_black_24dp)
    }

    override fun onViewReady() {
        presenter.takeView(this)
        lifecycle.addObserver(presenter)
        val bundle = intent.extras

        val localeID = Locale("in", "ID")
        val formatRP = NumberFormat.getCurrencyInstance(localeID)

        Glide.with(this).load("http://192.168.43.150/letsbook/images/event/poster/${bundle.getString("GAMBAR")}")
            .into(iv_image)

        Log.d("DHIKA", "RES: ${bundle.getInt("ID_EVENT")}");
        tv_biaya_content.text = formatRP.format(bundle.getString("LAYANAN").toDouble())
        tv_harga_content.text = formatRP.format(bundle.getString("HARGA_TIKET").toDouble())
        tv_waktu_content.text = bundle.getString("TANGGAL")
        tv_lokasi_content.text = bundle.getString("LOKASI")
        tv_total_content.text = formatRP.format("${bundle.getString("LAYANAN").toDouble()+bundle.getString("HARGA_TIKET").toDouble()}".toDouble())

        when{
            bundle.getString("STATUS") != "aktif" ->{
                btn_refund.setBackgroundColor(ContextCompat.getColor(applicationContext,R.color.yelow))
                btn_trans.text = "Refund"
                btn_trans.visibility = View.GONE
                btn_refund.visibility = View.VISIBLE
            }
            else ->{
                btn_trans.setBackgroundColor(ContextCompat.getColor(applicationContext,R.color.blue))
                btn_trans.text = "Selesai"
            }
        }

        btn_refund.setOnClickListener {
            presenter.goToMain(RefundRequest(sharedPreferenceHelper.getString(ID_PELANGGAN).toInt(),bundle.getString("ID_TRANSAKSI").toInt(),"refund"))
        }
    }

    override fun getrefund(response: RefundResponse) {
        startActivity(Intent(this@DetilRefundActivity,Main2Activity::class.java))
    }

}