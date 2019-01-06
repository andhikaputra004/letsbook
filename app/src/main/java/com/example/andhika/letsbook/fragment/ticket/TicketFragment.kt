package com.example.andhika.letsbook.fragment.ticket

import android.os.Bundle
import android.support.v4.app.Fragment
import android.support.v7.widget.LinearLayoutManager
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import com.bumptech.glide.Glide
import com.example.andhika.letsbook.R
import com.example.andhika.letsbook.common.GeneralRecyclerViewAdapter
import com.example.andhika.letsbook.deps.SharedPreferenceHelper
import com.example.andhika.letsbook.model.Listaktiftransaksi
import com.example.andhika.letsbook.model.TicketRequest
import com.example.andhika.letsbook.model.TicketResponse
import com.example.andhika.letsbook.utils.Costant.Common.Companion.ID_PELANGGAN
import dagger.android.support.DaggerFragment
import kotlinx.android.synthetic.main.fragment_main.*
import kotlinx.android.synthetic.main.viewholder_ticket.view.*
import javax.inject.Inject

class TicketFragment : DaggerFragment(), TicketContract.View {

    @Inject
    lateinit var presenter: TicketPresenter

    @Inject
    lateinit var sharedPreferenceHelper: SharedPreferenceHelper

    private val listEvent = mutableListOf<Listaktiftransaksi>()

    private val listAdapter by lazy {
        GeneralRecyclerViewAdapter(R.layout.viewholder_ticket, listEvent, { model, _, _ ->

        }, { model, view ->
            Glide.with(this).load("http://192.168.43.150/letsbook/images/event/poster/${model.gambarPoster}")
                .into(view.iv_ticket)
            view.tv_location.text = model.lokasi
            view.tv_price.text = model.hargaTiket
            view.tv_title.text = model.namaEvent
        })
    }


    override fun onCreateView(inflater: LayoutInflater, container: ViewGroup?, savedInstanceState: Bundle?) =
        inflater.inflate(
            R.layout.fragment_ticketku, container, false
        )

    override fun onViewCreated(view: View, savedInstanceState: Bundle?) {
        super.onViewCreated(view, savedInstanceState)
        presenter.takeView(this)
        lifecycle.addObserver(presenter)
        with(rv_list) {
            adapter = listAdapter
            layoutManager = LinearLayoutManager(activity, LinearLayoutManager.VERTICAL, false)
        }
    }

    override fun onResume() {
        super.onResume()
        presenter.goToMain(TicketRequest(sharedPreferenceHelper.getString(ID_PELANGGAN).toInt()))
    }

    override fun getListEvent(response: TicketResponse) {
        listEvent.clear()
        response.listaktiftransaksi?.let { listEvent.addAll(it) }
        listAdapter.notifyDataSetChanged()
    }
}