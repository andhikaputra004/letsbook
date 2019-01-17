package com.example.andhika.letsbook.fragment.refund

import android.content.Intent
import android.os.Bundle
import android.support.v4.content.ContextCompat
import android.support.v7.widget.LinearLayoutManager
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import com.bumptech.glide.Glide
import com.example.andhika.letsbook.R
import com.example.andhika.letsbook.common.GeneralRecyclerViewAdapter
import com.example.andhika.letsbook.deps.SharedPreferenceHelper
import com.example.andhika.letsbook.fragment.detil_refund.DetilRefundActivity
import com.example.andhika.letsbook.model.ListRefundResponse
import com.example.andhika.letsbook.model.Listaktiftransaksi
import com.example.andhika.letsbook.model.ListaktiftransaksiRe
import com.example.andhika.letsbook.model.TicketRequest
import com.example.andhika.letsbook.utils.Costant.Common.Companion.ID_PELANGGAN
import com.example.andhika.letsbook.utils.changeDateFormat
import dagger.android.support.DaggerFragment
import kotlinx.android.synthetic.main.fragment_refund.*
import kotlinx.android.synthetic.main.viewholder_ticket.view.*
import java.text.NumberFormat
import java.util.*
import javax.inject.Inject

class RefundFragment : DaggerFragment() , RefundContract.View {

    @Inject
    lateinit var presenter: RefundPresenter

    @Inject
    lateinit var sharedPreferenceHelper: SharedPreferenceHelper
    private val listEvent = mutableListOf<ListaktiftransaksiRe>()
    private val bundle = Bundle()

    val localeID = Locale("in", "ID")
    val formatRP = NumberFormat.getCurrencyInstance(localeID)
    private val listAdapter by lazy {
        GeneralRecyclerViewAdapter(R.layout.viewholder_ticket, listEvent, { model, _, _ ->
            bundle.apply {
                putString("HARGA_TIKET", model.hargaTiket)
                putString("LAYANAN",model.biayaPelayanan)
                putString("HARGA_TIKET", model.hargaTiket)
                putString("GAMBAR",model.gambarPoster)
                putString("TANGGAL",model.tanggalEvent)
                putString("LOKASI",model.lokasi)
                putString("STATUS",model.statusEvent)
                putString("ID_TRANSAKSI",model.idTransaksi)

            }
            startActivity(Intent(activity,DetilRefundActivity::class.java).apply {
                putExtras(bundle)
            })
        }, { model, view ->
            when{
                model.statusTiket.equals("aktif") ->{
                    Glide.with(this).load("http://192.168.43.150/letsbook/images/event/poster/${model.gambarPoster}")
                        .into(view.iv_ticket)
                    view.tv_time.text = model.tanggalEvent?.changeDateFormat("yyyy-MM-dd","dd MMMM yyyy")
                    view.tv_location.text = model.lokasi
                    view.tv_price.text = model.hargaTiket
                    view.tv_title.text = model.namaEvent
                    view.tv_status.visibility = View.VISIBLE
                    view.tv_status.text = model.statusTiket
                }
                else ->{
                    Glide.with(this).load("http://192.168.43.150/letsbook/images/event/poster/${model.gambarPoster}")
                        .into(view.iv_ticket)
                    view.tv_location.text = model.lokasi
                    view.tv_time.text = model.tanggalEvent?.changeDateFormat("yyyy-MM-dd","dd MMMM yyyy")
                    view.tv_price.text = model.hargaTiket
                    view.tv_title.text = model.namaEvent
                    view.tv_status.visibility = View.VISIBLE
                    view.tv_status.text = model.statusTiket
                    context?.let { ContextCompat.getColor(it,R.color.blue) }?.let { view.tv_status.setBackgroundColor(it) }
                }
            }
        })
    }
    override fun onCreateView(inflater: LayoutInflater, container: ViewGroup?, savedInstanceState: Bundle?) =
        inflater.inflate(R.layout.fragment_refund,container,false)

    override fun onViewCreated(view: View, savedInstanceState: Bundle?) {
        super.onViewCreated(view, savedInstanceState)
        presenter.takeView(this)
        lifecycle.addObserver(presenter)
        with(rv_list){
            adapter = listAdapter
            layoutManager = LinearLayoutManager(context,LinearLayoutManager.VERTICAL,false)
        }
    }
    override fun getListEvent(response: ListRefundResponse) {
        listEvent.clear()
        response.listaktiftransaksi?.let { listEvent.addAll(it) }
        listAdapter.notifyDataSetChanged()
    }

    override fun onResume() {
        super.onResume()
        presenter.goToMain(TicketRequest(sharedPreferenceHelper.getString(ID_PELANGGAN).toInt()))
    }
}