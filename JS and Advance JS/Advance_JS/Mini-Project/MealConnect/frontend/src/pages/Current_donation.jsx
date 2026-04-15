import React, { useEffect, useState } from "react";
import axios from "axios";

const CurrentDonations = () => {
  const [donations, setDonations] = useState([]);
  const [confirmedReceivers, setConfirmedReceivers] = useState([]);
  const [pendingReceivers, setPendingReceivers] = useState([]);
  const [loading, setLoading] = useState(true);

  const fetchData = async () => {
    const DONATION_API =
      import.meta.env.VITE_DONATION_API_URL || "http://localhost:3000";

    const TWILIO_API =
      import.meta.env.VITE_TWILIO_API_URL || "http://localhost:3005";

    try {
      const [donationsRes, confirmedRes, pendingRes] = await Promise.allSettled(
        [
          axios.get(`${DONATION_API}/api/donation/donations?status=Active`),
          axios.get(`${TWILIO_API}/api/receivers`),
          axios.get(`${TWILIO_API}/api/pending-receivers`),
        ],
      );

      if (donationsRes.status === "fulfilled") {
        setDonations(
          Array.isArray(donationsRes.value.data) ? donationsRes.value.data : [],
        );
      }

      if (confirmedRes.status === "fulfilled") {
        setConfirmedReceivers(
          Array.isArray(confirmedRes.value.data) ? confirmedRes.value.data : [],
        );
      }

      if (pendingRes.status === "fulfilled") {
        setPendingReceivers(
          Array.isArray(pendingRes.value.data) ? pendingRes.value.data : [],
        );
      }
    } catch (error) {
      console.error("Error fetching data:", error);
    } finally {
      setLoading(false);
    }
  };

  useEffect(() => {
    fetchData();

    const id = setInterval(() => {
      fetchData();
    }, 5000); // refresh every 5 seconds

    return () => clearInterval(id);
  }, []);

  return (
    <div className="p-6 bg-purple-50 min-h-screen">
      <h2 className="text-3xl font-bold mb-6 text-purple-800 text-center">
        Active Donations
      </h2>

      {loading ? (
        <p className="text-center text-purple-500">Loading data...</p>
      ) : (
        <>
          {donations.length > 0 ? (
            <div className="overflow-x-auto mb-10">
              <table className="min-w-full bg-white shadow-lg rounded-lg overflow-hidden">
                <thead className="bg-purple-700 text-white">
                  <tr>
                    <th className="py-3 px-6 text-left">Donor</th>
                    <th className="py-3 px-6 text-left">Email</th>
                    <th className="py-3 px-6 text-left">Category</th>
                    <th className="py-3 px-6 text-left">Description</th>
                    <th className="py-3 px-6 text-left">Address</th>
                    <th className="py-3 px-6 text-left">People Served</th>
                  </tr>
                </thead>
                <tbody>
                  {donations.map((donation, i) => (
                    <tr
                      key={donation.donation_id || donation._id || i}
                      className="border-b hover:bg-purple-100 transition"
                    >
                      <td className="py-3 px-6">{donation.donor_name}</td>
                      <td className="py-3 px-6 text-purple-700">
                        {donation.donor_email}
                      </td>
                      <td className="py-3 px-6">{donation.food_category}</td>
                      <td className="py-3 px-6 text-sm">
                        {donation.food_description}
                      </td>
                      <td className="py-3 px-6">{donation.address}</td>
                      <td className="py-3 px-6">{donation.people_served}</td>
                    </tr>
                  ))}
                </tbody>
              </table>
            </div>
          ) : (
            <p className="text-center text-purple-500">
              No active donations available.
            </p>
          )}

          <h2 className="text-3xl font-bold mb-6 text-purple-800 text-center">
            Receiver Status
          </h2>

          {[...confirmedReceivers, ...pendingReceivers].length > 0 ? (
            <div className="overflow-x-auto">
              <table className="min-w-full bg-white shadow-lg rounded-lg overflow-hidden">
                <thead className="bg-gray-700 text-white">
                  <tr>
                    <th className="py-3 px-6 text-left">Receiver Name</th>
                    <th className="py-3 px-6 text-left">Phone</th>
                    <th className="py-3 px-6 text-left">Count</th>
                    <th className="py-3 px-6 text-left">Status</th>
                  </tr>
                </thead>
                <tbody>
                  {confirmedReceivers.map((receiver, i) => (
                    <tr
                      key={receiver.receiver_id || receiver.phone || i}
                      className="border-b bg-green-100 hover:bg-green-200 transition"
                    >
                      <td className="py-3 px-6">{receiver.name}</td>
                      <td className="py-3 px-6">{receiver.phone}</td>
                      <td className="py-3 px-6">{receiver.count}</td>
                      <td className="py-3 px-6 text-green-700 font-semibold">
                        ✅ Confirmed
                        <br />
                        <span className="text-sm text-green-600">
                          {receiver.timestamp
                            ? new Date(receiver.timestamp).toLocaleString()
                            : ""}
                        </span>
                      </td>
                    </tr>
                  ))}

                  {pendingReceivers.map((receiver, i) => (
                    <tr
                      key={receiver.receiver_id || receiver.phone || i}
                      className="border-b bg-red-100 hover:bg-red-200 transition"
                    >
                      <td className="py-3 px-6">
                        {receiver.name || "Pending"}
                      </td>
                      <td className="py-3 px-6">{receiver.phone}</td>
                      <td className="py-3 px-6">-</td>
                      <td className="py-3 px-6 text-red-700 font-semibold">
                        ⏳ Pending
                      </td>
                    </tr>
                  ))}

                  {confirmedReceivers.length > 0 && (
                    <tr className="bg-yellow-100 font-semibold">
                      <td className="py-3 px-6" colSpan={2}></td>
                      <td className="py-3 px-6 text-purple-800">
                        Remaining: {confirmedReceivers[0].rem}
                      </td>
                      <td className="py-3 px-6"></td>
                    </tr>
                  )}
                </tbody>
              </table>
            </div>
          ) : (
            <p className="text-center text-gray-500">No receivers yet.</p>
          )}
        </>
      )}
    </div>
  );
};

export default CurrentDonations;
